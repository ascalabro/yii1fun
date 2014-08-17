<?php
Yii::app()->clientScript->registerCss('css', "

.ui-widget-content a {
color: #0088cc;
}
");
?>

<table>
    <tr>
        <th>Project Name</th>
        <th>Language</th>
        <th>Description</th>
        <th>Link</th>
    </tr>
    <?php
    foreach ($repos as $repo) {
        echo "<tr>";
        echo "<td>" . $repo->name . "</td>";
        echo "<td>" . $repo->language . "</td>";
        echo "<td>" . $repo->description . "</td>";
        echo "<td><a target='_blank' href='" . $repo->html_url . "'>" . $repo->html_url . "</a></td>";
        echo "</tr>";        
    }
    ?>
</table>

<?php // CVarDumper::dump($repos,'20',true); ?>
