<?php

class Display{
    public function __construct(){
        try {

        } catch (PDOException $e) {

        }
    }

    public function __destruct(){
        
    }

    public function createTable($res, $checkbox, $con){
        $tableheader = false;
        $html = '<div class="flex" style="overflow-x:auto table">';
        $html .= '<form action="index.php?con=' . $con . '&op=multidelete" method="POST">';
        $html .= '<input type="submit" name="multi_submit" value="Delete Select"/>';
        $html .= '<table>';
        foreach ($res as $row) {

            if($tableheader == false){
                $html .= "<tr>";

                if($checkbox == false){
                    $html .= "<th>Checkbox</th>";
                }

                foreach($row as $key => $value){
                    $html .= "<th>{$key}</th>";
                }
                $html .= "<th>actions</th>";
                $html .= "</tr>";
                $tableheader = true;
            }

            $html .= '<tr>';

            if($checkbox == false){
                $html .= "<td style='text-align:center;'>";
                $html .= "<input class='form-check-input' name='checked_id[]' type='checkbox' id=" . $row['id'] ." value=" . $row['id'] .">";
                $html .= "</td>";
            }

            foreach ($row as $key => $value) {
                $html .= "<td>" . $value . "</td>";
            }

            $html .= "<td style='display: flex; justify-content: space-between;'>";
            $html .= "<a href='index.php?con=" . $con . "&op=read&id=" . $row['id'] . "'><i class='fa fa-eye' style='font-size:30px; margin:1px'></i></a>";
            $html .= "<a href='index.php?con=" . $con . "&op=update&id=" . $row['id'] . "'><i class='fa fa-edit' style='font-size:30px; margin:1px'></i></a>";
            $html .= "<a href='index.php?con=" . $con . "&op=delete&id=" . $row['id'] . "'><i class='fa fa-trash' style='font-size:30px; margin:1px'></i></a>";
            $html .= "</td>";

            $html .= '</tr>';

        }
        $html .= "</table></div>";
        $html .= "</form>";
        return $html;
    }

    public function PageNavigation($pages, $page, $con){
        $html3 = "";
        $html3 .= "<nav class='mt-4 flex'>";
        
            $prevArrow = $page;
            $nextArrow = $page;
            $nextArrow++;

            if($nextArrow > $pages){
            $nextArrow = $pages;
            }
        
            $prevArrow--;
            if($prevArrow <= 0){
            $prevArrow = 1;
            }
    
            $html3 .= "<ul class='pagination'>";
            $html3 .= '<li class="link page-item"><a class="page-link" href="index.php?con='. $con .'&page=' . $prevArrow . '"> &laquo; </a></li>';
                for ($x = 1; $x <= $pages; $x++) {  
                    if ($page == $x) {
        
                        $html3 .= '<li class="link page-item active"><a class="page-link" href="index.php?con='. $con .'&page=' . $x . '">' . $x . '<span class="sr-only">(current)</span></a></li>';
                    
                    } else {
        
                        $html3 .= '<li class="link page-item"><a class="page-link" href="index.php?con='. $con .'&page=' . $x . '">' . $x . '</a></li>';
                    }
                }
                $html3 .=  '<li class="link page-item"><a class="page-link" href="index.php?con='. $con .'&page=' . $nextArrow . '"> &raquo; </a></li>';
            $html3 .= "</ul>";
        $html3 .= "</nav>";
    
        return $html3;
    
    }

    // public function createSelect($res){
    //     $html2 = "";
    //     $html2 .= "<form action='index.php?con=products&op=search' method='POST'>";
    //     $html2 .= '<select name="search" id="search" onchange="collectSearchProduct">';
    //     foreach ($res['name'] as $row) {
    //         $name = explode(' ', $row['name']);
    //         $html2 .= '<option value="' . $name[0] . '"> ' . $name[0] . '</option>';
    //     }
    //     $html2 .= '</select>';
    //     $html2 .= '<button class="btn" name="searchSubmit" type="submit">Submit</button>';
    //     $html2 .= "<form>";
    //     return $html2;
    // }

    public function createModal($op){
        $modal = "";
        $modal .= '<div id="myModal" class="modal">';
            $modal .= '<div class="modal-content">';
                $modal .= '<span class="close">&times;</span>';
                $modal .= '<p>The user is ' . $op . ' </p>';
            $modal .= '</div>';
        $modal .= '</div>';
    }
}

?>

