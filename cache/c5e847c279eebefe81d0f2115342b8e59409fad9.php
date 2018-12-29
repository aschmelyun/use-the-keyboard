<html>
<head>
    <title><?php echo e($title); ?></title>
</head>
<body>
    <h2><?php echo e($title); ?></h2>
    <p><?php echo e($meta_description); ?></p>
    <?php $__currentLoopData = $shortcuts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shortcut): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h3><?php echo e($shortcut->name); ?></h3>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html>