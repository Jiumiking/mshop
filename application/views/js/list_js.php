<script src="<?php echo base_url('application/js/page.js');?>"></script>
<script src="<?php echo base_url('application/js/imagesloaded.pkgd.min.js');?>"></script>
<script src="<?php echo base_url('application/js/masonry.pkgd.min.js');?>"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#list_content').imagesLoaded( function() {
        $('#list_content').masonry({
            itemSelector: '.masonry-list'
        });
        if ( $(document).height() - $(window).height() - $(document).scrollTop() - 20 <= 0 && pagelist.pageCount>pagelist.filter['page'] ){
            pagelist.nextPage();
        }
    });

    $(window).scroll(function(){
        if($(document).height() - $(window).height() - $(document).scrollTop() < 20){
            if( pagelist.pageCount>pagelist.filter['page'] ){
                pagelist.nextPage();
            }
        }
    });
});

//分页
var pagelist = new PageList("<?php echo site_url($this_controller.'/my_page');?>",<?php echo empty($this_setting['page_number'])?10:$this_setting['page_number'];?>);
pagelist.pageCount = <?php echo $pages['page_count']?>;
pagelist.pageCallback = function(data){
    data = eval("("+ data +")");
    var $boxes = $( data.list_content );
    $("#list_content").append( $boxes );
    $boxes.imagesLoaded( function() {
        $("#list_content").masonry( 'appended', $boxes);
    });
}
</script>