<!DOCTYPE html><html><head><meta charset="utf-8"><title>Admin Dashboard</title>
<style>body{font-family:Arial;margin:2rem;}table{border-collapse:collapse;width:100%;margin-bottom:2rem;}th,td{border:1px solid #ccc;padding:8px;text-align:left;}th{background:#eee;}button{padding:4px 8px;margin:2px;}</style>
</head><body>
<h1>Admin Dashboard</h1>
<h2>Contact Messages</h2>
<div style="display:flex; gap:20px;">
  <div style="width:30%; border:1px solid #ccc; padding:10px; max-height:360px; overflow:auto;" id="admin-inbox">Loading...</div>
  <div style="width:70%; border:1px solid #ccc; padding:10px;">
    <div id="admin-thread" style="height:300px; overflow-y:auto; border:1px solid #eee; padding:8px; background:#fafafa;"></div>
    <form id="admin-reply" style="display:flex; gap:8px; margin-top:8px;">
      <input type="hidden" id="reply-user-id">
      <input type="text" id="reply-msg" placeholder="Type a reply..." style="flex:1; padding:8px;">
      <button type="submit">Send</button>
    </form>
  </div>
</div>
<script>
async function j(u,o={}){const r=await fetch(u,o); try{return await r.json();}catch(e){return{};}}
async function loadInbox(){
  const data = await j('backend/admin_inbox.php'); const box = document.getElementById('admin-inbox');
  if(!data.success){ box.textContent='Failed'; return; }
  box.innerHTML=''; (data.inbox||[]).forEach(i=>{ const d=document.createElement('div'); d.style.padding='6px 4px'; d.style.borderBottom='1px solid #eee'; d.style.cursor='pointer';
    d.innerHTML = `${i.email} ${i.unread>0?'<span style="background:#d00;color:#fff;padding:2px 6px;border-radius:10px;font-size:12px;margin-left:6px;">'+i.unread+'</span>':''}`;
    d.onclick=()=>openThread(i.user_id, i.email); box.appendChild(d); });
}
async function openThread(uid,email){
  document.getElementById('reply-user-id').value=uid;
  const data = await j('backend/admin_thread.php?user_id='+uid);
  const t = document.getElementById('admin-thread'); if(!data.success){ t.textContent='Failed'; return; }
  t.innerHTML=''; (data.messages||[]).forEach(m=>{ const who = m.is_admin_reply==1? 'Admin':'User'; const div=document.createElement('div'); div.style.margin='6px 0'; div.innerHTML = `<b>${who}:</b> ${m.message}`; t.appendChild(div); });
  t.scrollTop = t.scrollHeight; loadInbox();
}
document.getElementById('admin-reply').addEventListener('submit', async (e)=>{
  e.preventDefault(); const uid=document.getElementById('reply-user-id').value; const msg=document.getElementById('reply-msg').value.trim(); if(!uid||!msg) return;
  const fd=new FormData(); fd.append('user_id',uid); fd.append('message',msg); await fetch('backend/send_admin_reply.php',{method:'POST',body:fd});
  document.getElementById('reply-msg').value=''; openThread(uid);
});
setInterval(loadInbox, 5000); loadInbox();
</script>
</body></html>