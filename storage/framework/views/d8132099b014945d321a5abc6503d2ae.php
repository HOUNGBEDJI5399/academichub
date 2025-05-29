<?php $__env->startSection('content'); ?>



     <link rel="icon" href="<?php echo e(asset('image/iconeacademic.ico')); ?>" type="image/x-icon"   style="background-color:blue;">
     <link rel="shortcut icon" href="<?php echo e(asset('image/iconeacademic.ico')); ?>" type="image/x-icon"   style="background-color:blue;">

  
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }
        
        .login-container {
            width: 100%;
            max-width: 380px;
            background: #F8F9FD;
            background: linear-gradient(0deg, rgb(255, 255, 255) 0%, rgb(145, 165, 188) 100%);
            border-radius: 24px;
            padding: 32px;
            border: 5px solid rgb(255, 255, 255);
            box-shadow: rgba(133, 189, 215, 0.8) 0px 30px 30px -20px;
            transition: transform 0.3s ease;
        }
        
        .login-container:hover {
            transform: translateY(-5px);
        }
        
        .heading {
            text-align: center;
            font-weight: 800;
            font-size: 28px;
            color: rgb(16, 137, 211);
            margin-bottom: 24px;
            text-shadow: 1px 1px 1px rgba(0,0,0,0.1);
            letter-spacing: 0.5px;
        }
        
        .form {
            margin-top: 10px;
        }
        
        .input-group {
            position: relative;
            margin-bottom: 20px;
        }
        
        .form form input[type="text"],
        .form form input[type="password"] {
            width: 100%;
            background: white;
            border: none;
            padding: 15px 20px;
            border-radius: 16px;
            box-shadow: rgba(207, 240, 255, 0.7) 0px 8px 16px -5px;
            border: 2px solid transparent;
            font-size: 15px;
            transition: all 0.2s ease;
        }
        
        .form form input[type="text"]::placeholder,
        .form form input[type="password"]::placeholder {
            color: rgb(170, 170, 170);
        }
        
        .form form input[type="text"]:focus,
        .form form input[type="password"]:focus {
            outline: none;
            border: 2px solid #12B1D1;
            box-shadow: rgba(18, 177, 209, 0.3) 0px 8px 24px -5px;
        }
        
        .invalid-feedback {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
            margin-left: 10px;
            display: block;
        }
        
        .options-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 15px 0;
            flex-wrap: wrap;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
        }
        
        .remember-me input[type="checkbox"] {
            width: 16px;
            height: 16px;
            margin-right: 8px;
            accent-color: rgb(16, 137, 211);
            cursor: pointer;
        }
        
        .remember-me label {
            font-size: 14px;
            color: #0099ff;
            cursor: pointer;
        }
        
        .forgot-password a {
            font-size: 14px;
            color: #0099ff;
            text-decoration: none;
            transition: color 0.2s;
        }
        
        .forgot-password a:hover {
            color: #0077cc;
            text-decoration: underline;
        }
        
        .login-button {
            display: block;
            width: 100%;
            font-weight: 600;
            font-size: 16px;
            background: linear-gradient(45deg, rgb(16, 137, 211) 0%, rgb(18, 177, 209) 100%);
            color: white;
            padding: 15px 20px;
            margin: 25px 0 10px;
            border-radius: 16px;
            box-shadow: rgba(133, 189, 215, 0.8) 0px 15px 15px -10px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
        }
        
        .login-button:hover {
            transform: translateY(-3px);
            box-shadow: rgba(133, 189, 215, 0.9) 0px 20px 20px -10px;
        }
        
        .login-button:active {
            transform: translateY(1px);
            box-shadow: rgba(133, 189, 215, 0.8) 0px 10px 10px -5px;
        }

        /* Responsive adjustments */
        @media (max-width: 480px) {
            .login-container {
                max-width: 320px;
                padding: 25px;
                margin: 0 15px;
            }
            
            .heading {
                font-size: 24px;
            }
            
            .options-row {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .forgot-password {
                margin-top: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="heading">ACADEMIC HUB<br>Connexion</div>
        <div class="form">
            <form action="<?php echo e(route('login')); ?>" method="POST">
            <?php echo csrf_field(); ?>
           
                <div class="input-group">
                    <input type="text" id="Identifiant" placeholder="Identifiant" 
                        class="form-control <?php $__errorArgs = ['login_identifier'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                        name="login_identifier" value="<?php echo e(old('login_identifier')); ?>" 
                        required autocomplete="email" autofocus>
                    
                    <?php $__errorArgs = ['login_identifier'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                
                <div class="input-group">
                    <input type="password" id="password" placeholder="Password" 
                        class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                        name="password" required autocomplete="current-password">
                    
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                
                <div class="options-row">
                    <div class="remember-me">
                        <input type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                        <label for="remember"><?php echo e(__('Remember Me')); ?></label>
                    </div>
                    
                    <?php if(Route::has('password.request')): ?>
                    <div class="forgot-password">
                        <a href="<?php echo e(route('password.request')); ?>"><?php echo e(__('Forgot Your Password?')); ?></a>
                    </div>
                    <?php endif; ?>
                </div>
                
                <button type="submit" class="login-button">
                    <?php echo e(__('Login')); ?>

                </button>
            </form>
        </div>
    </div>
</body>
</html>

<?php echo $__env->make('layouts.app2', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Admin\Documents\AcademicHub\gestionacademic\resources\views/auth/login.blade.php ENDPATH**/ ?>