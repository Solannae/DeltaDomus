<?php
    $title = 'F.A.Q';
    $cssFile = 'style-gestion-droits.css';
    $jsFile = 'gestion-droits.js';
?>

<?php ob_start(); ?>

<h1>FAQ</h1>

<button class="collapsible"><h3>Question 1</h3></button>
<div class="content">
    <p class="answer"> Maecenas sagittis condimentum nibh, vehicula ornare lectus. Donec et magna sit amet eros convallis lacinia eget nec lorem. Morbi sagittis arcu arcu. Nunc lacus lectus, congue vel massa a, maximus tempus risus. Nullam eu justo vitae purus tempus vehicula. Aliquam suscipit diam aliquam, imperdiet risus vel, tempus magna. Aliquam sed dictum eros, luctus condimentum nisi. Maecenas scelerisque magna purus, sed bibendum felis finibus sit amet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec ut ante eget ante pellentesque mollis quis ut mauris. Duis tellus mauris, pretium sed iaculis mattis, euismod venenatis ante. </p>
</div>
<button class="collapsible"><h3>Question 2</h3></button>
<div class="content">
    <p class="answer"> Maecenas sagittis condimentum nibh, vehicula ornare lectus. Donec et magna sit amet eros convallis lacinia eget nec lorem. Morbi sagittis arcu arcu. Nunc lacus lectus, congue vel massa a, maximus tempus risus. Nullam eu justo vitae purus tempus vehicula. Aliquam suscipit diam aliquam, imperdiet risus vel, tempus magna. Aliquam sed dictum eros, luctus condimentum nisi. Maecenas scelerisque magna purus, sed bibendum felis finibus sit amet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec ut ante eget ante pellentesque mollis quis ut mauris. Duis tellus mauris, pretium sed iaculis mattis, euismod venenatis ante. </p>
</div>
<button class="collapsible"><h3>Quetion 3</h3></button>
<div class="content">
    <p class="answer"> Maecenas sagittis condimentum nibh, vehicula ornare lectus. Donec et magna sit amet eros convallis lacinia eget nec lorem. Morbi sagittis arcu arcu. Nunc lacus lectus, congue vel massa a, maximus tempus risus. Nullam eu justo vitae purus tempus vehicula. Aliquam suscipit diam aliquam, imperdiet risus vel, tempus magna. Aliquam sed dictum eros, luctus condimentum nisi. Maecenas scelerisque magna purus, sed bibendum felis finibus sit amet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec ut ante eget ante pellentesque mollis quis ut mauris. Duis tellus mauris, pretium sed iaculis mattis, euismod venenatis ante. </p>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
