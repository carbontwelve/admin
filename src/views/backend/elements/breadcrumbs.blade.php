<ol class="breadcrumb">
    <?php
        $lastElementKey = key( end( $breadcrumbs ) );
        foreach ($breadcrumbs as $key => $breadcrumb){
            if ( $key == $lastElementKey )
            { ?>
    <li class="active"><?php echo ( isset( $breadcrumb['text'] ) ) ? $breadcrumb['text'] : ''; ?></li>
            <?php }else{ ?>
    <li><a href="<?php echo ( isset( $breadcrumb['href'] ) ) ? $breadcrumb['href'] : ''; ?>"><?php echo ( isset( $breadcrumb['text'] ) ) ? $breadcrumb['text'] : ''; ?></a></li>
            <?php }

        }
    ?>
</ol>
