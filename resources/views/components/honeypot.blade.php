{{-- Spam trap: hidden from people, bots fill it in. The timer catches forms sent instantly. Checked by the BlockSpamBots middleware. --}}
<div style="position:absolute;left:-10000px;top:auto;width:1px;height:1px;overflow:hidden;" aria-hidden="true">
    <label>Leave this field empty <input type="text" name="website" value="" tabindex="-1" autocomplete="off"></label>
</div>
<input type="hidden" name="form_started" value="{{ encrypt(now()->timestamp) }}">
