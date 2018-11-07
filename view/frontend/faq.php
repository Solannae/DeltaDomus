<?php
    $title = 'F.A.Q';
    $cssFile = 'style-faq.css';
?>

<?php ob_start(); ?>
<h1>F.A.Q</h1>
<h3 class="question">Question 1</h3>
<p class="answer"> Maecenas sagittis condimentum nibh, vehicula ornare lectus. Donec et magna sit amet eros convallis lacinia eget nec lorem. Morbi sagittis arcu arcu. Nunc lacus lectus, congue vel massa a, maximus tempus risus. Nullam eu justo vitae purus tempus vehicula. Aliquam suscipit diam aliquam, imperdiet risus vel, tempus magna. Aliquam sed dictum eros, luctus condimentum nisi. Maecenas scelerisque magna purus, sed bibendum felis finibus sit amet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec ut ante eget ante pellentesque mollis quis ut mauris. Duis tellus mauris, pretium sed iaculis mattis, euismod venenatis ante. </p>
<h3 class="question">Question 2</h3>
<p class="answer"> Maecenas sagittis condimentum nibh, vehicula ornare lectus. Donec et magna sit amet eros convallis lacinia eget nec lorem. Morbi sagittis arcu arcu. Nunc lacus lectus, congue vel massa a, maximus tempus risus. Nullam eu justo vitae purus tempus vehicula. Aliquam suscipit diam aliquam, imperdiet risus vel, tempus magna. Aliquam sed dictum eros, luctus condimentum nisi. Maecenas scelerisque magna purus, sed bibendum felis finibus sit amet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec ut ante eget ante pellentesque mollis quis ut mauris. Duis tellus mauris, pretium sed iaculis mattis, euismod venenatis ante. </p>
<h3 class="question">Question 3</h3>
<p class="answer"> Maecenas sagittis condimentum nibh, vehicula ornare lectus. Donec et magna sit amet eros convallis lacinia eget nec lorem. Morbi sagittis arcu arcu. Nunc lacus lectus, congue vel massa a, maximus tempus risus. Nullam eu justo vitae purus tempus vehicula. Aliquam suscipit diam aliquam, imperdiet risus vel, tempus magna. Aliquam sed dictum eros, luctus condimentum nisi. Maecenas scelerisque magna purus, sed bibendum felis finibus sit amet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec ut ante eget ante pellentesque mollis quis ut mauris. Duis tellus mauris, pretium sed iaculis mattis, euismod venenatis ante. </p>
<h3 class="question">Question 4</h3>
<p class="answer"> Maecenas sagittis condimentum nibh, vehicula ornare lectus. Donec et magna sit amet eros convallis lacinia eget nec lorem. Morbi sagittis arcu arcu. Nunc lacus lectus, congue vel massa a, maximus tempus risus. Nullam eu justo vitae purus tempus vehicula. Aliquam suscipit diam aliquam, imperdiet risus vel, tempus magna. Aliquam sed dictum eros, luctus condimentum nisi. Maecenas scelerisque magna purus, sed bibendum felis finibus sit amet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec ut ante eget ante pellentesque mollis quis ut mauris. Duis tellus mauris, pretium sed iaculis mattis, euismod venenatis ante. </p>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
