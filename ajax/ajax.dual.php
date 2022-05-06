<?php 

$qGet = $mysqli->query('
        SELECT token, name, path, score
        FROM assets
        ORDER BY RAND()
        LIMIT 2');
while ($dGet = $qGet->fetch_object())
    $rows[] = $dGet;

var_dump($rows);
?>
<div class="faces">
    <img src="<?php echo htmlspecialchars($rows[0]->path); ?>" class="assets" alt="<?php echo htmlspecialchars($rows[0]->name); ?>" data-token="<?php echo $rows[0]->token; ?>" data-score="<?php echo $rows[0]->score; ?>" height="400" />
    <ul>  
        <li><?php echo htmlspecialchars($rows[0]->name) ?></li>
        <li>Score : <?php echo number_format($rows[0]->score, 0, ',', ' '); ?></li>
    </ul>
</div>
<p id="middle">OU</p>
<div class="faces">
    <img src="<?php echo htmlspecialchars($rows[1]->path); ?>" class="assets" alt="<?php echo htmlspecialchars($rows[1]->name); ?>" data-token="<?php echo $rows[1]->token; ?>" data-score="<?php echo $rows[1]->score; ?>" height="400" />
    <ul>  
        <li><?php echo htmlspecialchars($rows[1]->name) ?></li>
        <li>Score : <?php echo number_format($rows[1]->score, 0, ',', ' '); ?></li>
    </ul>
</div>