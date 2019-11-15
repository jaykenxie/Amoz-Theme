<?php
/**
 * 时间归档
 *
 * @package custom
 */
?> <?php $this->need('header.php'); ?> <div id="body"><div class="container"><div class="row"> <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);   
    $year=0; $mon=0; $i=0; $j=0;   
    $output = '<div id="timeline">';   
    while($archives->next()):   
        $year_tmp = date('Y',$archives->created);   
        $mon_tmp = date('m',$archives->created);   
        $y=$year; $m=$mon;   
        if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';   
        if ($year != $year_tmp && $year > 0) $output .= '</ul>';   
        // if ($year != $year_tmp) {   
        //     $year = $year_tmp;   
        //     $output .= '<h3 class="al_year">'. $year .' 年</h3><ul class="al_mon_list">'; //输出年份   
        // }   
        if ($mon != $mon_tmp) {   
            $year = $year_tmp;
            $mon = $mon_tmp;   
            $output .= '<li><h3 class="al_mon">'.$year .'年'. $mon .' 月</h3><ul class="al_post_list">'; //输出月份   
        }   
        $output .= '<li>'.$mon_tmp.'月'.date('d日：',$archives->created).'<a href="'.$archives->permalink .'">'. $archives->title .'</a>  </li>'; //输出文章日期和标题   
        // <em>('. $archives->commentsNum.')</em>
      
    endwhile;   
    $output .= '</ul></li></ul></div>';   
    echo $output;   
?> <?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?> </div></div></div> <?php $this->need('footer.php'); ?>