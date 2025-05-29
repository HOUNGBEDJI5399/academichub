<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'ACADEMIC HUB')); ?></title>

    

     <link rel="icon" href="<?php echo e(asset('image/iconeacademic.ico')); ?>" type="image/x-icon"   style="background-color:blue;">
     <link rel="shortcut icon" href="<?php echo e(asset('image/iconeacademic.ico')); ?>" type="image/x-icon"   style="background-color:blue;">

  
    



    <!-- Fonts -->
  

   
</head>
<body>
        <div id="app"><br><br><br>

    
            <main class="py-4">
                <?php echo $__env->yieldContent('content'); ?>
            </main>
    
     
        </div>
</body>
</html><?php /**PATH C:\Users\Admin\Documents\AcademicHub\gestionacademic\resources\views/layouts/app2.blade.php ENDPATH**/ ?>