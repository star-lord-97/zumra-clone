<div class="flex justify-between items-center py-4 container mx-auto bg-primary px-4 text-white">
    <?php get_template_part('templates/logo') ?>
    <div class="hidden md:flex space-x-12">
        <?php get_template_part('templates/nav-links') ?>
    </div>
    <div class="hidden md:flex space-x-4">
        <?php get_template_part('templates/nav-login-register-links') ?>
        <?php get_template_part('templates/nav-icons') ?>
    </div>
    <button class="md:hidden focus:outline-none" id="mobile-menu-icon">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" class="fill-current">
            <path d="M0 0h24v24H0z" fill="none" />
            <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z" />
        </svg>
    </button>
</div>