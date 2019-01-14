<!DOCTYPE html>
<html>
<?php echo $__env->make('partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body class="<?php echo e($bodyClasses ?? ''); ?>">
    <div class="wrapper" id="app">
        <aside class="header">
            <div class="logo">
                <a href="/" class="img"><img src="/assets/img/usethekeyboard-logo.svg" width="106" height="32"></a>
                <a class="switcher" @click.prevent="toggleOperatingSystem" :class="{'is-right': operatingSystem === 'mac' || isMacOnly}"><span class="toggle"></span></a>
            </div>
            <div class="header-wrapper">
                <h1 class="title-primary"><?php echo e($meta_title); ?></h1>
                <p class="subtitle"><?php echo e($meta_description); ?></p>
                <a href="<?php echo e($reference_link); ?>" target="_blank" class="btn btn-primary">Original Reference</a>
                <a href="https://github.com/aschmelyun/use-the-keyboard/issues" target="_blank" class="ml-2 btn btn-secondary">Report Issue</a>
            </div>
        </aside>
        <main class="content">
            <div class="content-wrapper">
                <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <section class="shortcut-section" id="<?php echo e(str_replace(' ', '', $section->name)); ?>">
                        <h3 class="title-section"><span><?php echo e($section->name); ?></span></h3>
                        <div class="shortcuts">
                            <?php $__currentLoopData = $section->shortcuts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shortcut): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="shortcut">
                                    <p class="description"><?php echo e($shortcut->description); ?></p>
                                    <ul class="keys">
                                        <?php $__currentLoopData = $shortcut->keys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyIndex => $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="key"><?php echo e($key); ?></li>
                                            <?php if($keyIndex < (count($shortcut->keys) - 1)): ?>
                                                <li class="plus"></li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </section>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </main>
        <footer class="footer">
            <div class="credit">Built by <a href="https://twitter.com/aschmelyun">&commat;aschmelyun</a> &mdash; <a href="https://github.com/aschmelyun/use-the-keyboard/issues/new?labels=new%20page">Make a request</a></div>
        </footer>
    </div>
    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>
