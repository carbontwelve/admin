<ol class="breadcrumb">
    <?php
        $lastElement    = end( $breadcrumbs );
        foreach ($breadcrumbs as $breadcrumb){
            if ( $breadcrumb == $lastElement )
            { ?>
    <li class="active"><?php echo ( isset( $breadcrumb['text'] ) ) ? $breadcrumb['text'] : ''; ?></li>
            <?php }else{ ?>
    <li><a href="<?php echo ( isset( $breadcrumb['href'] ) ) ? $breadcrumb['href'] : ''; ?>"><?php echo ( isset( $breadcrumb['text'] ) ) ? $breadcrumb['text'] : ''; ?></a></li>
            <?php }

        }
    ?>
</ol>
