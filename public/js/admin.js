let allBooks = [];
let editingId = null;
let currentAppTitle = "Book Management System";
let currentCompanyName = "Your Bookstore";

const defaultConfig = {
    app_title: "Book Management System",
    company_name: "Your Bookstore",
};

const config = { ...defaultConfig };

// Initialize Element SDK
window.elementSdk.init({
    defaultConfig,
    onConfigChange: async (updatedConfig) => {
        config.app_title = updatedConfig.app_title || defaultConfig.app_title;
        config.company_name =
            updatedConfig.company_name || defaultConfig.company_name;

        document.getElementById("sidebarTitle").textContent =
            config.company_name;
        currentAppTitle = config.app_title;
        currentCompanyName = config.company_name;
        updateTopbarTitle();
    },
    mapToCapabilities: (cfg) => ({
        recolorables: [],
        borderables: [],
        fontEditable: undefined,
        fontSizeable: undefined,
    }),
    mapToEditPanelValues: (cfg) =>
        new Map([
            ["app_title", cfg.app_title || defaultConfig.app_title],
            ["company_name", cfg.company_name || defaultConfig.company_name],
        ]),
});

// Initialize Data SDK
const dataHandler = {
    onDataChanged(data) {
        allBooks = data;
        renderBooksTable();
        renderRecentBooks();
        updateStats();
    },
};

async function initializeApp() {
    const result = await window.dataSdk.init(dataHandler);
    if (!result.isOk) {
        console.error("Failed to initialize data SDK");
    }
    lucide.createIcons();
}

function updateTopbarTitle() {
    const views = {
        dashboard: "Dashboard",
        products: "Quản lý sản phẩm",
        categories: "Danh mục sách",
        reports: "Báo cáo",
        settings: "Cài đặt",
    };
    const currentView = document.querySelector(
        '[id$="-view"]:not([style*="display: none"])',
    );
    const viewId = currentView
        ? currentView.id.replace("-view", "")
        : "dashboard";
    document.getElementById("topbarTitle").textContent =
        views[viewId] || "Dashboard";
}

function switchView(view) {
    document.querySelectorAll('[id$="-view"]').forEach((el) => {
        el.style.display = "none";
    });
    document.getElementById(`${view}-view`).style.display = "block";

    document.querySelectorAll(".nav-item").forEach((el) => {
        el.classList.remove("active");
    });
    event.target.closest(".nav-item").classList.add("active");

    updateTopbarTitle();

    const searchBox = document.getElementById("searchInput");
    if (view === "products") {
        searchBox.style.display = "block";
    } else {
        searchBox.style.display = "none";
    }
}

function openModal(id = null) {
    editingId = id;
    const modal = document.getElementById("bookModal");
    const form = document.getElementById("bookForm");
    const title = document.getElementById("modalTitle");
    const submitBtn = document.getElementById("submitBtn");

    if (id) {
        const book = allBooks.find((b) => b.__backendId === id);
        if (book) {
            title.textContent = "Chỉnh sửa sách";
            document.getElementById("bookTitle").value = book.title;
            document.getElementById("bookAuthor").value = book.author;
            document.getElementById("bookCategory").value = book.category;
            document.getElementById("bookPrice").value = book.price;
            document.getElementById("bookStock").value = book.stock;
            submitBtn.innerHTML = "<span>Cập nhật</span>";
        }
    } else {
        title.textContent = "Thêm sách mới";
        form.reset();
        submitBtn.innerHTML = "<span>Thêm sách</span>";
    }

    modal.classList.add("active");
}

function closeModal() {
    document.getElementById("bookModal").classList.remove("active");
    editingId = null;
}

async function handleFormSubmit(e) {
    e.preventDefault();

    const submitBtn = document.getElementById("submitBtn");
    submitBtn.innerHTML =
        '<div class="loading-spinner" style="margin: 0 auto;"></div>';
    submitBtn.disabled = true;

    const bookData = {
        title: document.getElementById("bookTitle").value,
        author: document.getElementById("bookAuthor").value,
        category: document.getElementById("bookCategory").value,
        price: parseFloat(document.getElementById("bookPrice").value),
        stock: parseInt(document.getElementById("bookStock").value),
        status:
            parseInt(document.getElementById("bookStock").value) > 0
                ? "active"
                : "inactive",
    };

    try {
        let result;
        if (editingId) {
            const book = allBooks.find((b) => b.__backendId === editingId);
            result = await window.dataSdk.update({
                ...book,
                ...bookData,
            });
        } else {
            bookData.id = Date.now().toString();
            bookData.createdAt = new Date().toISOString();
            result = await window.dataSdk.create(bookData);
        }

        if (result.isOk) {
            showToast(
                editingId
                    ? "Cập nhật sách thành công!"
                    : "Thêm sách thành công!",
                "success",
            );
            closeModal();
        } else {
            showToast("Có lỗi xảy ra!", "error");
        }
    } finally {
        submitBtn.innerHTML = editingId
            ? "<span>Cập nhật</span>"
            : "<span>Thêm sách</span>";
        submitBtn.disabled = false;
    }
}

async function deleteBook(id) {
    const book = allBooks.find((b) => b.__backendId === id);
    if (!book) return;

    const confirmed = confirm("Bạn chắc chắn muốn xoá sách này?");
    if (!confirmed) return;

    const result = await window.dataSdk.delete(book);
    if (result.isOk) {
        showToast("Xoá sách thành công!", "success");
    } else {
        showToast("Có lỗi xảy ra!", "error");
    }
}

function renderBooksTable() {
    const tbody = document.getElementById("booksTableBody");

    if (allBooks.length === 0) {
        tbody.innerHTML = `
      <tr>
        <td colspan="7">
          <div class="empty-state">
            <i data-lucide="inbox" class="empty-icon"></i>
            <div class="empty-text">Chưa có sách nào</div>
          </div>
        </td>
      </tr>
    `;
        lucide.createIcons();
        return;
    }

    tbody.innerHTML = allBooks
        .map(
            (book) => `
    <tr>
      <td>${book.title}</td>
      <td>${book.author}</td>
      <td>${book.category}</td>
      <td class="price-text">${book.price.toLocaleString("vi-VN")} đ</td>
      <td>${book.stock}</td>
      <td>
        <span class="status-badge ${book.stock > 0 ? "status-active" : "status-inactive"}">
          ${book.stock > 0 ? "Còn hàng" : "Hết hàng"}
        </span>
      </td>
      <td>
        <div class="action-buttons">
          <button class="btn-icon" onclick="openModal('${book.__backendId}')">
            <i data-lucide="edit" style="width: 16px; height: 16px;"></i>
          </button>
          <button class="btn-icon btn-danger" onclick="deleteBook('${book.__backendId}')">
            <i data-lucide="trash-2" style="width: 16px; height: 16px;"></i>
          </button>
        </div>
      </td>
    </tr>
  `,
        )
        .join("");
    lucide.createIcons();
}

function renderRecentBooks() {
    const tbody = document.getElementById("recentBooksBody");
    const recent = allBooks.slice(-5).reverse();

    if (recent.length === 0) {
        tbody.innerHTML = `
      <tr>
        <td colspan="6">
          <div class="empty-state">
            <i data-lucide="inbox" class="empty-icon"></i>
            <div class="empty-text">Chưa có sách nào</div>
          </div>
        </td>
      </tr>
    `;
        lucide.createIcons();
        return;
    }

    tbody.innerHTML = recent
        .map(
            (book) => `
    <tr>
      <td>${book.title}</td>
      <td>${book.author}</td>
      <td class="price-text">${book.price.toLocaleString("vi-VN")} đ</td>
      <td>${book.stock}</td>
      <td>
        <span class="status-badge ${book.stock > 0 ? "status-active" : "status-inactive"}">
          ${book.stock > 0 ? "Còn hàng" : "Hết hàng"}
        </span>
      </td>
      <td>
        <div class="action-buttons">
          <button class="btn-icon" onclick="openModal('${book.__backendId}')">
            <i data-lucide="edit" style="width: 16px; height: 16px;"></i>
          </button>
          <button class="btn-icon btn-danger" onclick="deleteBook('${book.__backendId}')">
            <i data-lucide="trash-2" style="width: 16px; height: 16px;"></i>
          </button>
        </div>
      </td>
    </tr>
  `,
        )
        .join("");
    lucide.createIcons();
}

function updateStats() {
    const totalBooks = allBooks.length;
    const totalValue = allBooks.reduce(
        (sum, book) => sum + book.price * book.stock,
        0,
    );
    const inStock = allBooks.filter((b) => b.stock > 0).length;
    const outStock = allBooks.filter((b) => b.stock === 0).length;

    document.getElementById("totalBooks").textContent = totalBooks;
    document.getElementById("totalValue").textContent =
        totalValue.toLocaleString("vi-VN") + " đ";
    document.getElementById("inStock").textContent = inStock;
    document.getElementById("outStock").textContent = outStock;
}

function showToast(message, type = "success") {
    const toast = document.createElement("div");
    toast.className = `toast ${type}`;
    toast.innerHTML = `
    <i data-lucide="${type === "success" ? "check-circle" : "alert-circle"}" style="width: 20px; height: 20px;"></i>
    <span>${message}</span>
  `;
    document.body.appendChild(toast);
    lucide.createIcons();

    setTimeout(() => {
        toast.style.animation = "slideIn 0.3s ease reverse";
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}

document.getElementById("searchInput").addEventListener("input", (e) => {
    const query = e.target.value.toLowerCase();
    const tbody = document.getElementById("booksTableBody");
    const rows = tbody.querySelectorAll("tr");

    rows.forEach((row) => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(query) ? "" : "none";
    });
});

// Close modal on outside click
document.getElementById("bookModal").addEventListener("click", (e) => {
    if (e.target.id === "bookModal") closeModal();
});

// Initialize
initializeApp();
