<!DOCTYPE html>
<html><head><meta charset="utf-8"><title>Contact Admin</title>
<style>body{font-family:Arial;margin:2rem;}#chat{border:1px solid #ccc;height:320px;overflow-y:auto;padding:10px;margin-bottom:10px;background:#fafafa;}input,button{padding:8px;}</style>
</head><body>
<h1>Contact Admin</h1>
<div id="chat">Loading...</div>
<form id="contactForm" style="display:flex;gap:8px;">
  <input type="text" id="msg" placeholder="Type your message..." style="flex:1;">
  <button type="submit">Send</button>
</form>
<script>
async function fetchJSON(u,o={}){const r=await fetch(u,o); try{return await r.json();}catch(e){return{};}}
async function loadMsgs(){
  const d = await fetchJSON('backend/get_admin_messages.php'); const box=document.getElementById('chat');
  if(!d.success){ box.textContent=d.error||'Login required'; return; }
  box.innerHTML=''; (d.messages||[]).forEach(m=>{ const who=m.is_admin_reply==1?'Admin':'Me'; const div=document.createElement('div'); div.innerHTML=`<b>${who}:</b> ${m.message}`; box.appendChild(div); });
  box.scrollTop=box.scrollHeight;
}
document.getElementById('contactForm').addEventListener('submit', async (e)=>{
  e.preventDefault(); const v=document.getElementById('msg').value.trim(); if(!v) return;
  const fd=new FormData(); fd.append('message', v); await fetch('backend/contact_admin.php',{method:'POST',body:fd});
  document.getElementById('msg').value=''; loadMsgs();
});
setInterval(loadMsgs, 3000); loadMsgs();
</script>
</body></html>