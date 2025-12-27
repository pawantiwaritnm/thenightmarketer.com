<!DOCTYPE html>
<html>
<head>
  <title>DeepSeek Janus Image Generator</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    #popupBox{display:none;position:fixed;top:20%;left:50%;transform:translateX(-50%);background:#fff;padding:20px;border:1px solid #333;border-radius:8px;width:450px;z-index:1001}
    #overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.6);z-index:1000}
    .btn{padding:8px 12px;border-radius:6px;border:1px solid #111;background:#111;color:#fff;cursor:pointer}
    .btn.secondary{background:#ddd;color:#111}
    #resultImg{max-width:100%;margin-top:15px;display:none;border:1px solid #eee;padding:5px;border-radius:6px}
  </style>
</head>
<body>

<button class="btn" onclick="openPopup()">Generate Image - DeepSeek Janus</button>

<div id="overlay"></div>
<div id="popupBox">
  <h3>DeepSeek Janus Image Generator</h3>
  <textarea id="prompt" rows="4" style="width:100%;" placeholder="Describe the image you want..."></textarea>
  <br><br>
  <button class="btn" onclick="generateImage()">Generate</button>
  <button class="btn secondary" onclick="closePopup()">Close</button>
  <p id="status" style="margin-top:10px;color:#555;"></p>
  <img id="resultImg"/>
</div>

<script>
function openPopup(){
  document.getElementById('popupBox').style.display='block';
  document.getElementById('overlay').style.display='block';
}
function closePopup(){
  document.getElementById('popupBox').style.display='none';
  document.getElementById('overlay').style.display='none';
}

async function generateImage(){
  const prompt = document.getElementById('prompt').value;
  const status = document.getElementById('status');
  const img = document.getElementById('resultImg');

  if(!prompt){ alert('Enter a prompt'); return; }
  status.innerText = "Generating image... please wait...";
  img.style.display = 'none';

  const res = await fetch("{{ route('ai.image') }}", {
    method: 'POST',
    headers:{
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
      'Content-Type':'application/json'
    },
    body: JSON.stringify({ prompt })
  });

  const data = await res.json();
  if(data.image_url){
    img.src = data.image_url;
    img.style.display = 'block';
    status.innerText = "✅ Done!";
  } else {
    status.innerText = "❌ Failed: " + (data.error || 'Unknown error');
  }
}
</script>

</body>
</html>
