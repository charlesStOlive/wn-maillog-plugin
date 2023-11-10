<iframe id="emailFrame" srcdoc="<?= htmlspecialchars($value) ?>" style="width: 100%;"  onload="resizeIframe(this)"></iframe>

<script>
function resizeIframe(iframe) {
    iframe.style.height = iframe.contentWindow.document.documentElement.scrollHeight + 'px';
}
</script>
