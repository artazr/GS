<?php include ('header.php'); ?>

 <menu>
    <?php include ('menu.php'); ?>
</menu>
    <div id="info">
        <div >
            <div class="title">
                <h2>Mes Messages</h2>
                <span>Regardez si vous avez de nouveaux messages !</span> 
            </div>
            <div >
                    <ul>
                        <li>
                            <?php include ('../controller/historiqueModule.php'); ?>
                        </li>
                    </ul> 
            </div>
        </div>
    </div>

    <br />
    

        <?php include ('footer.php'); ?>


        
   
    

     

