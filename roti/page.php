<?php include_once 'inc/generics.php' ?>
<?php include_once 'inc/header.php' ?>
<?php include_once 'inc/initThumbnail.php' ?>
<?php include_once 'inc/sidebar.php' ?>


<content class="unfixed"><fixer class="ltr">

    <?php

    createThumbnail("Lorem Ipsum", "by Neque porro", " heading cover", "alt", "images/navigation-bg.png", "","","",NULL);

    


	

	?>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut lacinia ante. Donec eget sem quam. Nullam gravida mattis consequat. Donec quis quam posuere, lacinia justo a, malesuada mi. Ut quis lorem interdum, mattis mauris in, volutpat mi. Etiam sit amet augue libero. Cras augue nisl, sagittis eget congue eu, vestibulum sed libero. In felis metus, aliquam a imperdiet eget, aliquet in diam. Nulla cursus diam eget augue ultricies, sed malesuada lectus iaculis. Nunc ut tortor neque. In lobortis quam eu metus mattis fringilla. Curabitur nec magna porta, ultricies purus at, efficitur urna. Praesent ac rhoncus augue. Etiam suscipit nibh ac lacinia pellentesque. Proin vulputate mollis varius. Nunc ex dui, scelerisque nec neque eu, mattis vehicula augue.

</p>

<?php
    createThumbnail("Lorem Ipsum", "<hr>test", "rtl cover heading nested border-all background-none alt", "static transparent", "", "","","",NULL);


    createThumbnail("Lorem Ipsum", "", "rtl cover sub-heading", "static", "", "","","",NULL); 

    createThumbnail("Lorem Ipsum", "", "rtl cover sub-heading border border-none background background-none", "static", "", "","","",NULL);

    createThumbnail("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.", "-test", "rtl cover quote unfixed", "static", "", "","","",NULL);

    createThumbnail("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.", "-test", "ltr cover quote unfixed", "static transparent alt", "", "","","",NULL);

?><?php createThumbnail("Lorem Ipsum", "info info", "rtl right indi", "", "", "","","",NULL);
	  createThumbnail("Lorem Ipsum", "info info", "rtl right indi", "", "", "","","",NULL);
	  ?>
<p>Cras vel lorem auctor, efficitur sapien nec, ornare metus. Etiam nunc lacus, porttitor a ornare in, tristique ultrices massa. Cras efficitur fermentum sem, ac imperdiet ante sodales et. Cras vitae lorem urna. Fusce vehicula pretium mi, in sodales est sollicitudin sit amet. Etiam massa arcu, tincidunt nec ligula et, vulputate semper sapien. Aliquam vel venenatis neque. Nullam consequat ultrices ex ac accumsan. Maecenas varius et felis vitae commodo. Curabitur fermentum euismod vulputate. Praesent ac nulla et odio iaculis placerat. Etiam id sagittis lorem, non laoreet nisl. Aliquam vitae nisl congue metus posuere malesuada ac nec lectus. Sed elementum ex sed tellus porta, quis luctus lectus ornare. Phasellus congue placerat rutrum. Vivamus volutpat sem id libero ornare lobortis.
<div class="clear-fix"></div><?php
	  createThumbnail("Lorem Ipsum", "info info", "rtl right indi", "", "", "","","",NULL);
	  createThumbnail("Lorem Ipsum", "info info", "rtl right indi", "", "", "","","",NULL);
?>
</p><p>Vestibulum pretium sapien sit amet dui rutrum hendrerit. Integer pellentesque fermentum quam sed lacinia. Aliquam vestibulum aliquam dolor, et vehicula magna egestas dictum. Nulla tincidunt blandit varius. Nulla sollicitudin massa quis rhoncus rhoncus. Fusce et arcu interdum, vestibulum massa non, ultrices nunc. Pellentesque mollis felis ac massa pellentesque, ac eleifend arcu consectetur. Nunc vel elit pretium, dapibus massa sed, mollis ipsum. Aliquam suscipit sem sed mi bibendum, ac rhoncus leo commodo. Sed facilisis ac quam et tristique. Morbi finibus suscipit elit ut vulputate. Etiam et condimentum metus.
<?php createThumbnail("Lorem Ipsum", "info info", "rtl left large long indi", "", "", "","","",NULL);?>

</p><p>Nunc elementum quam diam, id cursus augue facilisis rhoncus. Suspendisse luctus arcu sed ornare sagittis. Curabitur ut arcu tincidunt, congue nisl in, pharetra urna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi finibus eu turpis sit amet bibendum. Integer facilisis odio sem, sit amet convallis nisl convallis a. Suspendisse quis scelerisque felis. Ut lacinia erat in molestie facilisis. Proin in ex in odio placerat varius vel ut lectus. Aenean vel lobortis quam. Aliquam eu metus in odio pulvinar viverra sed eu eros. Sed molestie justo nulla, vitae ultricies ante rhoncus in. Duis ligula orci, mattis non egestas eget, consequat in leo. Suspendisse ac rhoncus nisi. Vivamus id ligula a nisi viverra feugiat. Aenean et dui sit amet dolor pharetra dignissim.

</p><p>
Phasellus tempor tempus malesuada. Quisque semper velit dui, vitae viverra ipsum tincidunt at. Etiam vitae augue magna. Fusce et eleifend diam. Donec in tincidunt leo, id semper enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus egestas massa pulvinar, scelerisque mauris eu, posuere nisl. Ut eu ipsum tempor, hendrerit risus at, rutrum elit. Duis pharetra leo id accumsan dignissim. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
</p>

<p>
    <?php getRecords("*","test","1=1"); ?>
    </p>
</fixer></content>


<?php include_once 'inc/footer.php' ?>