<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user9-150x150.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Поиск..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Список', 'options' => ['class' => 'header']],
                    //['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    //['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'СХ культуры',
                        'icon' => 'list',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Агрокультура', 'icon' => 'table', 'url' => ['/agriculture'],],
                            ['label' => 'Сорта', 'icon' => 'table', 'url' => ['/varieties'],],
                        ],
                    ],
                    [
                        'label' => 'Сельхозтехника',
                        'icon' => 'list',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Тип сельхозтехники', 'icon' => 'truck', 'url' => ['/vehicle-type'],],
                            ['label' => 'Сельхозтехника', 'icon' => 'truck', 'url' => ['/vehicle'],],
                            ['label' => 'Навесное оборудование', 'icon' => 'truck', 'url' => ['/accessory'],],
                        ],
                    ],
                    ['label' => 'Поля', 'icon' => 'table', 'url' => ['/field']],
                    ['label' => 'Посевы', 'icon' => 'table', 'url' => ['/crops']],
                    ['label' => 'Химические средства', 'icon' => 'flask', 'url' => ['/pesticide']],
                    ['label' => 'Обработанные посевы', 'icon' => 'table', 'url' => ['/cultivated-fields']],
                    ['label' => 'Анализ данных', 'icon' => 'area-chart', 'url' => ['/time-series']],
                    ['label' => 'Отчеты', 'icon' => 'file-text-o', 'url' => ['/report']],
                    ['label' => 'Пользователи', 'icon' => 'user', 'url' => ['/login']],
                ],
            ]
        ) ?>

    </section>

</aside>
