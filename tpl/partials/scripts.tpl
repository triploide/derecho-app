<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="/js/materialize.js"></script>
<script src="/js/init.js"></script>
<script>
    var bloquearPublicidad = setInterval(function () {
        $('img[alt="www.000webhost.com"]').parent().parent().remove();
    }, 30);
    setTimeout(function() {
        clearInterval(bloquearPublicidad);
    }, 3000);
</script>