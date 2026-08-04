<!-- Footer -->
        <footer class="mobile-footer bg-gray-800 text-white py-8 md:py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 md:gap-8">
                    <div class="md:col-span-2">
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="w-8 h-8 md:w-10 md:h-10 bg-gradient-to-br from-amber-100 to-orange-200 rounded-lg flex items-center justify-center">
                                <img src="<?= base_url('assets/images/LogoPoltek.png') ?>" alt="Logo Politeknik Darma Ganesha" class="w-8 h-8 object-contain">
                            </div>
                            <h3 class="text-lg md:text-xl font-bold">Politeknik Darma Ganesha</h3>
                        </div>
                        <p class="text-gray-300 mb-3 text-sm md:text-base leading-relaxed">
                            <?= lang('footer_description') ?>
                        </p>
                        <div class="flex space-x-4">
                            <ul class="space-y-2 text-gray-300">
                                <li class="flex items-center">
                                    <a href="#" class="text-gray-300 hover:text-amber-400 transition-colors">
                                        <i class="fab fa-facebook text-lg md:text-xl"></i>
                                        <span> Politeknik Darma Ganesha</span>
                                    </a>
                                </li>
                                <li class="flex items-center">
                                    <a href="#" class="text-gray-300 hover:text-amber-400 transition-colors">
                                        <i class="fab fa-instagram text-lg md:text-xl"></i>
                                        <span> @poltekdg_official</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="hidden md:block">
                        <h4 class="text-lg font-semibold mb-4"><?= lang('study_program') ?></h4> 
                        <ul class="space-y-2">
                            <li><a href="<?= base_url('base/prodi_si'); ?>" class="text-gray-300 hover:text-white transition-colors"><?= lang('d3_information_system') ?></a></li>
                            <li><a href="<?= base_url('base/prodi_ph'); ?>" class="text-gray-300 hover:text-white transition-colors"><?= lang('d3_hospitality') ?></a></li>
                        </ul>
                    </div>

                    <div class="hidden md:block">
                        <h4 class="text-lg font-semibold mb-4"><?= lang('contact') ?></h4>
                        <ul class="space-y-2 text-gray-300">
                            <li class="flex items-center">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                <p class="mb-1 text-white">
                                <strong><?= lang('campus_a') ?>:</strong> Jl. Mufakat No 9 Air Merbau Tanjung Pandan (Gedung Hitam-Putih)
                                </p>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                 <p class="mb-3 text-white">
                                <strong><?= lang('campus_b') ?>:</strong> Jalan Wisma Ria II, Lalang, Manggar, Belitung Timur (Gedung Eks. Pergib Manggar)
                                </p>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-phone mr-2"></i>
                                <p><strong class="text-white"><?= lang('director_phone') ?>:</strong> <a href="tel:081287119043" class="text-white text-decoration-none">+62 812-8711-9043</a></p>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-envelope mr-2"></i>
                                <p class="text-white"><?= lang('email') ?>:</p>
                                <a href="mailto:darmaganeshapoliteknik@gmail.com" class="text-white text-decoration-none"> email: darmaganeshapoliteknik@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="border-t border-gray-700 mt-6 md:mt-8 pt-4 md:pt-8 text-center">
                    <p class="text-gray-300 text-sm md:text-base">
                        <p class="text-white mb-0">
                        Copyright &copy;
                        by <a href="https://www.instagram.com/reyz_l/" target="_blank" class="text-white text-decoration-none">Rezka Apriyandi</a>
                        <script>document.write(new Date().getFullYear());</script>
                        </p>
                    </p>
                </div>
            </div>
        </footer>