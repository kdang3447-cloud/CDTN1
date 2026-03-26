const defaultConfig = {
    store_name: "Cửa hàng Sách",
    search_placeholder: "Tìm kiếm sách...",
    featured_title: "Sách nổi bật",
    categories_title: "Mua theo danh mục",
    footer_text: "Nơi mua sách trực tuyến lớn nhất với đa dạng thể loại sách.",
};

function applyConfig(config) {
    const finalConfig = { ...defaultConfig, ...config };
    document.getElementById("storeName").textContent = finalConfig.store_name;
    document.getElementById("searchInput").placeholder =
        finalConfig.search_placeholder;
    document.getElementById("featuredTitle").textContent =
        finalConfig.featured_title;
    document.getElementById("categoriesTitle").textContent =
        finalConfig.categories_title;
    document.getElementById("footerText").textContent = finalConfig.footer_text;
}

if (window.elementSdk) {
    window.elementSdk.init({
        defaultConfig,
        onConfigChange: async (config) => {
            applyConfig(config);
        },
        mapToCapabilities: () => ({
            recolorables: [],
            borderables: [],
            fontEditable: undefined,
            fontSizeable: undefined,
        }),
        mapToEditPanelValues: (config) =>
            new Map([
                ["store_name", config.store_name || defaultConfig.store_name],
                [
                    "search_placeholder",
                    config.search_placeholder ||
                        defaultConfig.search_placeholder,
                ],
                [
                    "featured_title",
                    config.featured_title || defaultConfig.featured_title,
                ],
                [
                    "categories_title",
                    config.categories_title || defaultConfig.categories_title,
                ],
                [
                    "footer_text",
                    config.footer_text || defaultConfig.footer_text,
                ],
            ]),
    });
}

applyConfig(defaultConfig);
lucide.createIcons();
