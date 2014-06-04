<body style="background-color:#E5DBC1">

	<div class="panel panel-default">
        <div class="panel-body">

            <div style="text-align:center; overflow:auto; float:left; width:40%;">
                <h1>My Avatar</h1>
                <img src="http://www.clipartbest.com/cliparts/nTB/X6B/nTBX6BETA.gif" height="10%" width="10%">
                <!-- Total coins for student -->
                <?php

                    $coinsquery = ("SELECT sum(`StorySum`) FROM `vw_totalstorycoins`
                        WHERE `StudentName` = '$user'");
                        $result = $db->query($coinsquery);
                        $coins = $result->fetch(PDO::FETCH_BOTH);

                        if ($coins[0] == null) {
                            $coins[0] = 0;
                        }
                ?>
                <h3>You have <?php print $coins[0] ?> coins!</h3>
                <p>View your inventory here. You can purchase more items at the store!</p>
            </div>

            <div id="avatarSlider" class="slider">

                <a href="#" class="control_prev"><img src="leftarrow.png"></a>

                <ul class="sliderul">
                    <li class="sliderli">
                        <section class="page">
                            <table class="table">
                                <tr>
                                    <td><a href="#" class="thumbnail">
                                            <img src="/avatarimages/Shirt.png"
                                                 alt="Shirt" width="30%" height="30%">
                                        </a></td>
                                    <td><a href="#" class="thumbnail">
                                            <img src="/avatarimages/Green Shirt.png"
                                                 alt="Shirt" width="30%" height="30%">
                                        </a></td>
                                    <td><a href="#" class="thumbnail">
                                            <img src="/avatarimages/Grey Shirt.png"
                                                 alt="Shirt" width="30%" height="30%">
                                        </a></td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="thumbnail">
                                            <img src="/avatarimages/Shirt.png"
                                                 alt="Shirt" width="30%" height="30%">
                                        </a></td>
                                    <td><a href="#" class="thumbnail">
                                            <img src="/avatarimages/Green Shirt.png"
                                                 alt="Shirt" width="30%" height="30%">
                                        </a></td>
                                    <td><a href="#" class="thumbnail">
                                            <img src="/avatarimages/Grey Shirt.png"
                                                 alt="Shirt" width="30%" height="30%">
                                        </a></td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="thumbnail">
                                            <img src="/avatarimages/Shirt.png"
                                                 alt="Shirt" width="30%" height="30%">
                                        </a></td>
                                    <td><a href="#" class="thumbnail">
                                            <img src="/avatarimages/Green Shirt.png"
                                                 alt="Shirt" width="30%" height="30%">
                                        </a></td>
                                    <td><a href="#" class="thumbnail">
                                            <img src="/avatarimages/Grey Shirt.png"
                                                 alt="Shirt" width="30%" height="30%">
                                        </a></td>
                                </tr>
                            </table>
                        </section>
                    </li>
                    <li class="page">
                        <table class="table">
                            <tr>
                                <td><a href="#" class="thumbnail">
                                        <img src="/avatarimages/Green Pants.png"
                                             alt="Shirt" width="25%" height="25%">
                                    </a></td>
                                <td><a href="#" class="thumbnail">
                                        <img src="/avatarimages/Orange Pants.png"
                                             alt="Shirt" width="25%" height="25%">
                                    </a></td>
                                <td><a href="#" class="thumbnail">
                                        <img src="/avatarimages/White Pants.png"
                                             alt="Shirt" width="25%" height="25%">
                                    </a></td>
                            </tr>
                            <tr>
                                <td><a href="#" class="thumbnail">
                                        <img src="/avatarimages/Green Pants.png"
                                             alt="Shirt" width="25%" height="25%">
                                    </a></td>
                                <td><a href="#" class="thumbnail">
                                        <img src="/avatarimages/Orange Pants.png"
                                             alt="Shirt" width="25%" height="25%">
                                    </a></td>
                                <td><a href="#" class="thumbnail">
                                        <img src="/avatarimages/White Pants.png"
                                             alt="Shirt" width="25%" height="25%">
                                    </a></td>
                            </tr>
                            <tr>
                                <td><a href="#" class="thumbnail">
                                        <img src="/avatarimages/Green Pants.png"
                                             alt="Shirt" width="25%" height="25%">
                                    </a></td>
                                <td><a href="#" class="thumbnail">
                                        <img src="/avatarimages/Orange Pants.png"
                                             alt="Shirt" width="25%" height="25%">
                                    </a></td>
                                <td><a href="#" class="thumbnail">
                                        <img src="/avatarimages/White Pants.png"
                                             alt="Shirt" width="25%" height="25%">
                                    </a></td>
                            </tr>
                        </table>
                    </li>
                </ul>
                <a href="#" class="control_next"><img src="rightarrow.png"></a>
            </div>

        </div>
	</div>
</body>