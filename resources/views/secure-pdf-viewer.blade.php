<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1"/>
<title>Company Profile</title>
<style>
  body,html{height:100%;margin:0;font-family:Arial;background:#f4f4f6}
  #toolbar{height:56px;display:flex;align-items:center;padding:8px 16px;background:#fff;box-shadow:0 1px 2px rgba(0,0,0,.06)}
  #pdfContainer{padding:12px;overflow:auto;height:calc(100vh - 56px);display:flex;flex-direction:column;align-items:center}
  .pageCanvasWrap{margin:12px 0;background:#fff}
  .muted{color:#666;font-size:13px}
</style>
<style>
  body,html{height:100%;margin:0;font-family:Arial;background:#f4f4f6}
  /* make toolbar sticky and above everything */
  #toolbar{
    position:sticky;
    top:0;
    z-index:9999;
    height:56px;
    display:flex;
    align-items:center;
    padding:8px 16px;
    background:#fff;
    box-shadow:0 1px 2px rgba(0,0,0,.06)
  }
  /* container sits below toolbar */
  #pdfContainer{
    padding:12px;
    overflow:auto;
    height:calc(100vh - 56px);
    display:flex;
    flex-direction:column;
    align-items:center;
    /* ensure it doesn't cover toolbar */
    z-index:1;
  }
  .pageCanvasWrap{
    margin:12px 0;
    background:#fff;
    position:relative; /* required for annotation overlay */
    width:100%;
    display:flex;
    justify-content:center;
  }
  /* annotation overlay anchors (transparent clickable box) */
  .pdf-annotation {
    position:absolute;
    display:block;
    background: transparent;
    border: none;
    z-index: 2;
    cursor: pointer;
  }
  .muted{color:#666;font-size:13px}
  /* ensure canvas does not prevent toolbar clicks */
  canvas.pdf-page { display:block; pointer-events: auto; max-width:100%; height:auto; }
</style>

</head>
<body>
  <div id="toolbar">
    <div style="font-weight:600">Company Profile</div>
    <div style="margin-left:auto;display:flex;gap:8px;align-items:center;">
      <div class="muted">You are viewing as: {{ $viewer['name'] ?? 'Guest' }}</div>
      <button id="zoomOut">-</button>
      <button id="zoomIn">+</button>
    </div>
  </div>

  <div id="pdfContainer">Loading PDF viewer…</div>

  <!-- load UMD pdf.js (must be present in public/pdfjs/build/) -->
  <script src="{{ asset('pdfjs/build/pdf.js') }}"></script>
  <script>
(function () {
  const container = document.getElementById('pdfContainer');
  const signedStreamUrl = {!! json_encode($signedUrl ?? '') !!};

  if (!signedStreamUrl) {
    container.innerText = 'Missing signed stream URL. Contact admin.';
    return;
  }
  if (typeof pdfjsLib === 'undefined') {
    container.innerText = 'PDF viewer unavailable (pdf.js not loaded).';
    console.error('pdfjsLib is not defined — check public/pdfjs/build/pdf.js');
    return;
  }
  pdfjsLib.GlobalWorkerOptions.workerSrc = "{{ asset('pdfjs/build/pdf.worker.js') }}";

  // buttons - ensure they are type=button in HTML or handle fallback
  const zoomInBtn = document.getElementById('zoomIn');
  const zoomOutBtn = document.getElementById('zoomOut');

  let userZoom = 1.0;          // user-controlled zoom (via +/-)
  let baseAutoScale = 1.0;     // automatic fit-to-width scale

  async function fetchPdfBuffer(url) {
    const resp = await fetch(url, { credentials: 'same-origin' });
    if (!resp.ok) throw new Error('Stream fetch failed: ' + resp.status);
    return await resp.arrayBuffer();
  }

  // create annotation overlay anchors for Link annotations
  function renderAnnotations(annotations, viewport, wrapper) {
    // remove old anchors if any
    wrapper.querySelectorAll('.pdf-annotation').forEach(el => el.remove());

    annotations.forEach(function(ann) {
      if (ann.subtype !== 'Link') return;

      // target url: either annotation.url or action.uri
      const url = ann.url || (ann.action && ann.action.uri) || null;
      if (!url) return;

      // annotation.rect is in PDF coordinate space; convert to viewport rect
      const rect = pdfjsLib.Util.normalizeRect(ann.rect);
      const viewRect = viewport.convertToViewportRectangle(rect);
      // convertToViewportRectangle returns [x1, y1, x2, y2] in device space
      const x1 = Math.min(viewRect[0], viewRect[2]);
      const y1 = Math.min(viewRect[1], viewRect[3]);
      const x2 = Math.max(viewRect[0], viewRect[2]);
      const y2 = Math.max(viewRect[1], viewRect[3]);
      const left = x1;
      const top = y1;
      const width = x2 - x1;
      const height = y2 - y1;

      const a = document.createElement('a');
      a.className = 'pdf-annotation';
      a.href = url;
      a.target = '_blank';
      a.rel = 'noopener noreferrer';
      a.style.left = left + 'px';
      a.style.top = top + 'px';
      a.style.width = Math.max(width, 6) + 'px';
      a.style.height = Math.max(height, 6) + 'px';
      a.style.display = 'block';
      a.style.background = 'transparent';
      // keep pointer events and allow click
      wrapper.appendChild(a);
    });
  }

  async function renderPdf(arrayBuffer) {
    container.innerHTML = '';
    const pdf = await pdfjsLib.getDocument({ data: arrayBuffer }).promise;

    const viewerName = {!! json_encode($viewer['name'] ?? 'Guest') !!};
    const viewerEmail = {!! json_encode($viewer['email'] ?? null) !!};
    const watermarkBase = viewerName + (viewerEmail ? (' • ' + viewerEmail) : '') + ' • ' + new Date().toLocaleString();

    // compute baseAutoScale based on first page width so all pages fit
    const firstPage = await pdf.getPage(1);
    const firstVp = firstPage.getViewport({ scale: 1 });
    const screenWidth = Math.max(window.innerWidth - 40, 300);
    baseAutoScale = Math.min(Math.max(screenWidth / firstVp.width, 0.6), 1.2);

    for (let p = 1; p <= pdf.numPages; ++p) {
      const page = await pdf.getPage(p);

      // apply responsive scale and user zoom
      const totalScale = baseAutoScale * userZoom;
      const viewport = page.getViewport({ scale: totalScale });

      const wrap = document.createElement('div');
      wrap.className = 'pageCanvasWrap';
      wrap.style.width = '100%';
      wrap.style.maxWidth = Math.min(viewport.width, window.innerWidth - 40) + 'px';
      wrap.style.position = 'relative';

      const canvas = document.createElement('canvas');
      canvas.className = 'pdf-page';
      // set canvas drawing size (device pixels)
      const ratio = window.devicePixelRatio || 1;
      canvas.width = Math.floor(viewport.width * ratio);
      canvas.height = Math.floor(viewport.height * ratio);
      // set CSS size so it fits container
      canvas.style.width = Math.floor(viewport.width) + 'px';
      canvas.style.height = Math.floor(viewport.height) + 'px';

      wrap.appendChild(canvas);
      container.appendChild(wrap);

      const ctx = canvas.getContext('2d');
      // scale context for device pixel ratio
      ctx.setTransform(ratio, 0, 0, ratio, 0, 0);

      await page.render({ canvasContext: ctx, viewport }).promise;

      // annotations: fetch and render anchors
      try {
        const annotations = await page.getAnnotations({ intent: 'display' });
        renderAnnotations(annotations, viewport, wrap);
      } catch (e) {
        console.warn('annotation render failed', e);
      }

      // watermark on top of canvas (still inside wrap so anchors sit above)
      try {
        const wmCtx = canvas.getContext('2d');
        wmCtx.save();
        wmCtx.globalAlpha = 0.16;
        wmCtx.fillStyle = '#000';
        const fontSize = Math.floor(Math.min(canvas.width, canvas.height) / (20*ratio));
        wmCtx.font = (fontSize) + 'px Arial';
        wmCtx.translate((canvas.width/ratio)/2, (canvas.height/ratio)/2);
        wmCtx.rotate(-0.6);
        const step = fontSize * 12;
        for (let y = -canvas.height; y < canvas.height; y += step) {
          wmCtx.fillText(watermarkBase, -canvas.width, y);
        }
        wmCtx.restore();
      } catch (e) {
        console.warn('watermark failed', e);
      }
    }
  }

  // initial load
  (async function() {
    try {
      const buffer = await fetchPdfBuffer(signedStreamUrl);
      await renderPdf(buffer);
    } catch (err) {
      console.error(err);
      container.innerText = 'Error loading PDF: ' + (err.message || err);
    }
  })();

  // Zoom handlers
  if (zoomInBtn) zoomInBtn.addEventListener('click', async () => {
    userZoom *= 1.15;
    try { const buffer = await fetchPdfBuffer(signedStreamUrl); await renderPdf(buffer); } catch(e){console.error(e);}
  });
  if (zoomOutBtn) zoomOutBtn.addEventListener('click', async () => {
    userZoom /= 1.15;
    try { const buffer = await fetchPdfBuffer(signedStreamUrl); await renderPdf(buffer); } catch(e){console.error(e);}
  });

  // keep toolbar clickable etc.
  document.addEventListener('contextmenu', e => e.preventDefault());
  document.addEventListener('selectstart', e => e.preventDefault());
  document.addEventListener('dragstart', e => e.preventDefault());

  // recompute fit on resize (debounced)
  let resizeTimer;
  window.addEventListener('resize', () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(async () => {
      try { const buffer = await fetchPdfBuffer(signedStreamUrl); await renderPdf(buffer); } catch(e){console.error(e);}
    }, 200);
  });
})();
</script>
</body>
</html>
