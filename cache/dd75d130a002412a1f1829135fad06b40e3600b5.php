<!DOCTYPE html>
<html>
<?php echo $__env->make('partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body class="<?php echo e($bodyClasses ?? ''); ?>">
    <header class="header-landing">
        <div class="logo">
            <a href="/"><img src="/assets/img/usethekeyboard-logo.svg" width="106" height="32"></a>
        </div>
    </header>
    <div class="wrapper" id="app">
        <div class="container intro">
            <div class="row">
                <div class="hidden-sm-down col-md-5">
                    <img src="/assets/img/undraw_taking_notes.svg">
                </div>
                <div class="col-md-7 intro-wrapper">
                    <div class="intro-text">
                        <h1 class="title-primary">Use The Keyboard</h1>
                        <p class="subtitle">A collection of keyboard shortcuts for Mac and Windows programs.</p>
                        <input type="text" class="search-input" id="searchInput" placeholder="Search..." v-model="searchInput">
                    </div>
                </div>
            </div>
            <div class="row mb-8">
                <div class="col-sm-12">
                    <section class="shortcut-section">
                        <h3 class="title-section"><span>Most Popular</span></h3>
                        <div class="row row-programs">
                            <?php $__currentLoopData = $popular; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $data = json_decode(file_get_contents($contentDir . '/' . $file . '.json'));
                                ?>
                                <div class="col-sm-12 col-md-4 col-lg-3 data-program" data-title="<?php echo e($data->slug); ?>" data-slug="<?php echo e($data->slug); ?>">
                                    <a class="program is-popular" href="/<?php echo e($data->slug); ?>">
                                        <img src="/assets/img/logo-<?php echo e($data->slug); ?>.png">
                                        <span><?php echo e($data->title); ?></span>
                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </section>
                    <section class="shortcut-section">
                        <h3 class="title-section"><span>All Programs</span></h3>
                        <div class="row row-programs">
                            <?php
                                $contentFiles = array_diff(scandir($contentDir), array('.', '..'));
                            ?>
                            <?php $__currentLoopData = $contentFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $data = json_decode(file_get_contents($contentDir . '/' . $file));
                                ?>
                                <?php if($data->slug === '/'): ?>
                                    <?php continue; ?>;
                                <?php endif; ?>
                                <div class="col-sm-12 col-md-4 col-lg-3 data-program" data-title="<?php echo e($data->slug); ?>" data-slug="<?php echo e($data->slug); ?>">
                                    <a class="program" href="/<?php echo e($data->slug); ?>">
                                        <span><?php echo e($data->title); ?></span>
                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer-landing">
        <div class="credit">Built by <a href="https://twitter.com/aschmelyun">&commat;aschmelyun</a></div>
    </footer>
    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>
