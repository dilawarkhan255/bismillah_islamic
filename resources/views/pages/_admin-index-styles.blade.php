<style>
  .ai-wrap { padding: 48px 0 64px; background: var(--light-bg, #faf7f0); }
  .ai-head { display:flex; justify-content:space-between; align-items:flex-end; gap:16px; flex-wrap:wrap; margin-bottom:20px; }
  .ai-eyebrow { color:#b45309; font:700 11px/1.4 'Inter',sans-serif; letter-spacing:1px; text-transform:uppercase; }
  .ai-title { font-family:'Inter',sans-serif; color:var(--navy); font-size:clamp(24px,4vw,34px); margin:8px 0 4px; }
  .ai-sub { color:#666; margin:0; }
  .ai-actions { display:flex; gap:8px; flex-wrap:wrap; }
  .ai-btn { padding:9px 16px; background:var(--gold); color:#fff; text-decoration:none; font:700 13px 'Inter',sans-serif; }
  .ai-btn--light { background:#fff; color:var(--navy); border:1px solid rgba(174,130,37,.35); }
  .ai-search { width:100%; max-width:420px; padding:10px 14px; border:1px solid rgba(174,130,37,.35); margin-bottom:18px; font-family:'Inter',sans-serif; }
  .ai-item { background:#fff; border:1px solid rgba(174,130,37,.2); padding:16px; height:100%; box-shadow:0 3px 14px rgba(13,27,42,.05); }
  .ai-item.is-muted { opacity:.65; }
  .ai-name { color:var(--navy); font-size:16px; }
  .ai-tag { font-size:11px; font-weight:700; padding:2px 8px; background:rgba(108,117,125,.15); color:#555; }
  .ai-bar { height:6px; background:rgba(174,130,37,.15); margin:12px 0 6px; }
  .ai-bar span { display:block; height:100%; background:var(--gold); }
  .ai-award { font-size:26px; color:var(--gold); margin-top:2px; }
  .ai-links { display:flex; gap:14px; flex-wrap:wrap; margin-top:12px; padding-top:10px; border-top:1px solid rgba(174,130,37,.12); }
  .ai-links a { font-size:13px; font-weight:700; color:var(--navy); text-decoration:none; }
  .ai-links a.wa { color:#128C7E; }
  .ai-links a:hover { color:var(--gold); }
  [data-theme="dark"] .ai-wrap { background:transparent; }
  [data-theme="dark"] .ai-item, [data-theme="dark"] .ai-search, [data-theme="dark"] .ai-btn--light { background:rgba(255,255,255,.04); color:#f0efe8; }
  [data-theme="dark"] .ai-title, [data-theme="dark"] .ai-name, [data-theme="dark"] .ai-links a { color:#f0efe8; }
</style>
