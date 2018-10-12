
<script>
$(document).ready(function(){
    $('.one-time').slick({
        dots:true,
        arrows:true,
        autoplay:false,
        infinite:true,
        speed:300,
        appendArrows: $('.pointers'),
        nextArrow: "<img src='img/seta-modal-direita.png'>",
        prevArrow: "<img src='img/seta-modal-esquerda.png'>",
    })
});
</script>
