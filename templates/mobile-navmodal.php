<div class="hidden fixed top-0 left-0 z-40 w-screen h-screen" id="mobile-nav-modal" style="background: rgba(0, 0, 0, 0.5);">
    <div class="fixed w-4/5 z-50 bg-white rounded-xl border-4 border-primary" style="top: 20%; left: 10%">
        <div class="flex flex-col items-center justify-between space-y-8 my-8 text-primary">
            <?php get_template_part('templates/nav-links') ?>
            <div class="flex space-x-8">
                <?php get_template_part('templates/nav-login-register-links') ?>
            </div>
            <div class="flex space-x-8">
                <?php get_template_part('templates/nav-icons') ?>
            </div>
        </div>
    </div>
</div>