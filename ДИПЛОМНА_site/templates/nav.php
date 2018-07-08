<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<nav class="navbar-inverse">
    <div class="navbar-header">
        <!-- butona pri skrito menuto -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li>
                <a href="./index.php">Начало</a>
            </li>
            <li class="dropdown-toggle">
                <a data-toggle="dropdown" href="#">Услуги
                    <i class="fas fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li class="firstSub ">Профилактика
                        <i class="fas fa-angle-right"></i>
                        <ul class="secondSub menu1">
                            <li>
                                <a href="health_goods.php?subgood=Вътрешно обезпаразитяване">Вътрешно обезпаразитяване</a>
                            </li>
                            <li>
                                <a href="health_goods.php?subgood=Външно обезпаразитяване">Външно обезпаразитяване</a>
                            </li>
                            <li>
                                <a href="health_goods.php?subgood=Ваксинации">Ваксинации</a>
                            </li>
                        </ul>
                    </li>
                    <li class="firstSub">Лечение
                        <i class="fas fa-angle-right"></i>
                        <ul class="secondSub menu2">
                            <li>
                                <a href="health_goods.php?subgood=Паразитни заболявания">Паразитни заболявания</a>
                            </li>
                            <li>
                                <a href="health_goods.php?subgood=Инфекциозни заболявания">Инфекциозни заболявания</a>
                            </li>
                            <li>
                                <a href="health_goods.php?subgood=Вътрешни болести">Вътрешни болести</a>
                            </li>
                        </ul>
                    </li>
                    <li class="firstSub">Акушерство, гинекология
                        <i class="fas fa-angle-right"></i>
                        <ul class="secondSub menu3">
                            <li>
                                <a href="health_goods.php?subgood=Бременност, раждане и гинекология">Бременност, раждане и гинекология</a>
                            </li>
                            <li>
                                <a href="health_goods.php?subgood=Установяване и проследяване на бременността">Установяване и проследяване на бременността</a>
                            </li>
                            <li>
                                <a href="health_goods.php?subgood=Асистирано раждане">Асистирано раждане</a>
                            </li>
                            <li>
                                <a href="health_goods.php?subgood=Цезарово сечение">Цезарово сечение</a>
                            </li>
                            <li>
                                <a href="health_goods.php?subgood=Изкуствено осеменяване">Изкуствено осеменяване</a>
                            </li>
                        </ul>
                    </li>
                    <li class="firstSub">Лаборатории
                        <i class="fas fa-angle-right"></i>
                        <ul class="secondSub menu4">
                            <li>
                                <a href="health_goods.php?subgood=Хематологични изследвания">Хематологични изследвания</a>
                            </li>
                            <li>
                                <a href="health_goods.php?subgood=Биохимични изследвания">Биохимични изследвания</a>
                            </li>
                            <li>
                                <a href="health_goods.php?subgood=Микроскопски изследвания">Микроскопски изследвания</a>
                            </li>
                            <li>
                                <a href="health_goods.php?subgood=Бързи тестове">Бързи тестове</a>
                            </li>
                        </ul>
                    </li>
                    <li class="firstSub "><a href="health_goods.php?subgood=Хирургия">Хиругия</li></a>
                    <li class="firstSub "><a href="health_goods.php?subgood=Онкологични заболявания">Онкологични заболявания</li></a>
                    <li class="firstSub "><a href="health_goods.php?subgood=Дерматология">Дерматология</li></a>
                    <li class="firstSub "><a href="health_goods.php?subgood=Образна диагностика">Образна диагностика</li></a>
                </ul>
                
            </li>
            <li class="drodown-toggle">
                <a data-toggle="dropdown" href="#">Магазин <i class="fas fa-angle-down"></i></a>
                <ul class="dropdown-menu">
                    <li class="firstSub"><a href="./foods.php">Храни</a></li>
                    <li class="firstSub"><a href="./accessories.php">Аксесоари</a></li>
                </ul>
            </li>
            <li>
                <a href="./gallery.php">Галерия</a>
            </li>
            <li>
                <a href="./crew.php">Екип</a>
            </li>
            <li>
                <a href="./faq.php">Въпроси/отговори</a>
            </li>
            <li>
                <a href="./contact.php">Контакти</a>
            </li>
            <li>
                <a href="./hour_reserve.php">Запази час</a>
            </li>
            
        </ul>
        <?php
    
        if(isset($_SESSION['user']))
        {
            echo "<ul class='nav navbar-nav navbar-right'>";
            echo "<li><a href='logout.php'>Излез, ".$_SESSION['user']."</a></li>";
            echo "</ul>";
        }
        else
        {
            echo "<ul class='nav navbar-nav navbar-right'>";
            echo "<li><a href='registration.php'><i class='fas fa-user'></i> Регистрация</a></li>";
            echo "<li><a href='login.php'><i class='fas fa-sign-in-alt'></i> Вход</a></li>";
            echo "</ul>";
        }

        ?>
    </div>
</nav>