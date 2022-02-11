
  <div class="layer"></div>
<main class="page-center">
  <article class="sign-up">
    <h1 class="sign-up__title">Welcome back!</h1>
    <p class="sign-up__subtitle">Sign in to your account to continue</p>

    <?= form_open('auth/login/', 'class="sign-up-form form"'); ?>
      <label class="form-label-wrapper">
        <p class="form-label">Username</p>
        <input class="form-input" type="text" name="username" placeholder="Enter your username" required>
      </label>
      <label class="form-label-wrapper">
        <p class="form-label">Password</p>
        <input class="form-input" type="password" name="password" placeholder="Enter your password" required>
      </label>
      <a class="link-info forget-link" href="##">Forgot your password?</a>
      <label class="form-checkbox-wrapper">
        <input class="form-checkbox" type="checkbox" required>
        <span class="form-checkbox-label">Remember me next time</span>
      </label>
      <button class="form-btn primary-default-btn transparent-btn" type="submit">Sign in</button>
    <?= form_close(); ?>
  </article>
</main>

