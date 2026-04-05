<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Đăng Nhập & Đăng Ký Hệ Thống">
    <title><?php echo $__env->yieldContent('title', 'Đăng Nhập'); ?> — ShopAdmin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* ============================
           DESIGN TOKENS – LIGHT THEME (From Master)
        ============================ */
        :root {
            --bg-page:       #f0f2f8;
            --bg-card:       #ffffff;

            --accent:        #6c63ff;
            --accent-dark:   #5046e5;
            --accent-light:  #ede9fe;
            --accent-text:   #4f46e5;

            --danger:        #ef4444;
            --danger-light:  #fee2e2;

            --text-primary:  #1e1b4b;
            --text-secondary:#4b5563;
            --text-muted:    #9ca3af;
            --border:        #e5e7eb;

            --shadow-md:     0 4px 16px rgba(0,0,0,.10), 0 2px 6px rgba(0,0,0,.06);
            --shadow-lg:     0 8px 30px rgba(108,99,255,.18), 0 2px 8px rgba(0,0,0,.06);
            --shadow-card:   0 2px 20px rgba(0,0,0,.09);

            --radius-sm:     8px;
            --radius-md:     12px;
            --radius-lg:     16px;
            --transition:    .2s cubic-bezier(.4,0,.2,1);
        }

        /* ============================
           RESET
        ============================ */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { font-size: 15px; }
        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-page);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        a { text-decoration: none; color: inherit; }

        /* ============================
           AUTH CONTAINER
        ============================ */
        .auth-container {
            width: 100%;
            max-width: 440px;
            padding: 20px;
        }

        .auth-logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo-icon {
            width: 56px; height: 56px;
            background: linear-gradient(135deg, var(--accent), #818cf8);
            border-radius: 14px;
            display: inline-flex; align-items: center; justify-content: center;
            font-size: 28px;
            box-shadow: 0 4px 16px rgba(108,99,255,.35);
            margin-bottom: 12px;
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--text-primary);
            letter-spacing: -.5px;
            display: block;
        }
        .logo-text span {
            color: var(--accent);
        }

        .card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-card);
            padding: 36px 30px;
        }

        .card-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .card-title {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 8px;
        }
        .card-subtitle {
            font-size: .88rem;
            color: var(--text-muted);
        }

        /* ============================
           FORM ELEMENTS
        ============================ */
        .form-group { margin-bottom: 22px; }

        .form-label {
            display: block;
            font-size: .82rem;
            font-weight: 600;
            color: var(--text-secondary);
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            background: #f9fafb;
            border: 1.5px solid var(--border);
            border-radius: var(--radius-sm);
            color: var(--text-primary);
            padding: 12px 14px;
            font-size: .95rem;
            font-family: 'Inter', sans-serif;
            transition: all var(--transition);
            outline: none;
        }
        .form-control:focus {
            background: #fff;
            border-color: var(--accent);
            box-shadow: 0 0 0 4px rgba(108,99,255,.12);
        }
        .form-control::placeholder { color: var(--text-muted); }

        .invalid-feedback { font-size: .8rem; color: var(--danger); margin-top: 6px; font-weight: 500; display: block; }
        .is-invalid { border-color: var(--danger) !important; background: #fff5f5 !important; }

        /* ============================
           BUTTONS
        ============================ */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 18px;
            border-radius: var(--radius-sm);
            font-size: .95rem;
            font-weight: 600;
            cursor: pointer;
            border: none;
            transition: all var(--transition);
            width: 100%;
            font-family: 'Inter', sans-serif;
        }
        .btn-primary {
            background: linear-gradient(135deg, var(--accent), #818cf8);
            color: #fff;
            box-shadow: 0 4px 14px rgba(108,99,255,.35);
        }
        .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 6px 20px rgba(108,99,255,.45); }

        .auth-footer {
            margin-top: 24px;
            text-align: center;
            font-size: .88rem;
            color: var(--text-secondary);
        }
        .auth-footer a {
            color: var(--accent-text);
            font-weight: 600;
            transition: color var(--transition);
        }
        .auth-footer a:hover {
            color: var(--accent-dark);
            text-decoration: underline;
        }

        .alert-danger {
            background: var(--danger-light);
            border: 1px solid #fca5a5; 
            color: #991b1b;
            padding: 12px 16px;
            border-radius: var(--radius-sm);
            margin-bottom: 20px;
            font-size: .85rem;
            font-weight: 500;
        }
    </style>
</head>
<body>

<div class="auth-container">
    <div class="auth-logo">
        <div class="logo-icon">🛒</div>
        <div class="logo-text">Shop<span>Admin</span></div>
    </div>
    
    <?php echo $__env->yieldContent('content'); ?>
</div>

</body>
</html>
<?php /**PATH A:\xampp\htdocs\bookstore-mvc\resources\views/layouts/auth.blade.php ENDPATH**/ ?>