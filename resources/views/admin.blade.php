<!doctype html>
<html lang="vi">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Management System</title>
  <script src="https://cdn.tailwindcss.com/3.4.17"></script>
  <script src="https://cdn.jsdelivr.net/npm/lucide@0.263.0/dist/umd/lucide.min.js"></script>
  <script src="/_sdk/element_sdk.js"></script>
  <script src="/_sdk/data_sdk.js"></script>
  <link rel="stylesheet" href="/css/admin.css">
 </head>
 <body>
  <div class="app-wrapper">
   <div class="main-layout"><!-- Sidebar -->
    <div class="sidebar">
     <div class="logo-section"><i data-lucide="book-open" class="logo-icon"></i>
      <div class="logo-text" id="sidebarTitle">
       BookStore
      </div>
     </div>
     <nav style="flex: 1;">
      <div class="nav-item active" onclick="switchView('dashboard')"><i data-lucide="layout-dashboard" class="nav-icon"></i> <span>Dashboard</span>
      </div>
      <div class="nav-item" onclick="switchView('products')"><i data-lucide="book" class="nav-icon"></i> <span>Sản phẩm</span>
      </div>
      <div class="nav-item" onclick="switchView('categories')"><i data-lucide="tag" class="nav-icon"></i> <span>Danh mục</span>
      </div>
      <div class="nav-item" onclick="switchView('reports')"><i data-lucide="bar-chart-3" class="nav-icon"></i> <span>Báo cáo</span>
      </div>
      <div class="nav-item" onclick="switchView('settings')"><i data-lucide="settings" class="nav-icon"></i> <span>Cài đặt</span>
      </div>
     </nav>
     <div style="border-top: 1px solid rgba(100, 116, 139, 0.2); padding-top: 16px;">
      <div class="nav-item"><i data-lucide="user" class="nav-icon"></i> <span>Tài khoản</span>
      </div>
     </div>
    </div><!-- Main Content -->
    <div class="content-wrapper"><!-- Topbar -->
     <div class="topbar">
      <div class="topbar-title" id="topbarTitle">
       Dashboard
      </div>
      <div class="topbar-actions">
       <div class="search-box"><i data-lucide="search" style="width: 18px; height: 18px;"></i> <input type="text" id="searchInput" placeholder="Tìm kiếm..." style="display: none;">
       </div><button class="btn-primary" id="addBtn" onclick="openModal()"> <i data-lucide="plus" style="width: 18px; height: 18px;"></i> <span>Thêm sản phẩm</span> </button>
      </div>
     </div><!-- Main Content Area -->
     <div class="main-content"><!-- Dashboard View -->
      <div id="dashboard-view">
       <div class="stats-grid">
        <div class="stat-card">
         <div class="stat-label">
          Tổng sách
         </div>
         <div class="stat-value" id="totalBooks">
          0
         </div>
        </div>
        <div class="stat-card">
         <div class="stat-label">
          Tổng giá trị
         </div>
         <div class="stat-value" id="totalValue">
          0 đ
         </div>
        </div>
        <div class="stat-card">
         <div class="stat-label">
          Sách còn hàng
         </div>
         <div class="stat-value" id="inStock">
          0
         </div>
        </div>
        <div class="stat-card">
         <div class="stat-label">
          Hết hàng
         </div>
         <div class="stat-value" id="outStock">
          0
         </div>
        </div>
       </div>
       <div class="section-header">
        <div class="section-title">
         Sách gần đây
        </div><button class="btn-primary" onclick="switchView('products')"> <span>Xem tất cả</span> <i data-lucide="arrow-right" style="width: 18px; height: 18px;"></i> </button>
       </div>
       <div class="table-container">
        <div class="table-wrapper">
         <table id="recentBooksTable">
          <thead>
           <tr>
            <th>Tên sách</th>
            <th>Tác giả</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
           </tr>
          </thead>
          <tbody id="recentBooksBody">
           <tr>
            <td colspan="6">
             <div class="empty-state"><i data-lucide="inbox" class="empty-icon"></i>
              <div class="empty-text">
               Chưa có sách nào
              </div>
             </div></td>
           </tr>
          </tbody>
         </table>
        </div>
       </div>
      </div><!-- Products View -->
      <div id="products-view" style="display: none;">
       <div class="section-header">
        <div class="section-title">
         Quản lý sản phẩm
        </div><button class="btn-primary" onclick="openModal()"> <i data-lucide="plus" style="width: 18px; height: 18px;"></i> <span>Thêm sách</span> </button>
       </div>
       <div class="table-container">
        <div class="table-wrapper">
         <table>
          <thead>
           <tr>
            <th>Tên sách</th>
            <th>Tác giả</th>
            <th>Danh mục</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
           </tr>
          </thead>
          <tbody id="booksTableBody">
           <tr>
            <td colspan="7">
             <div class="empty-state"><i data-lucide="inbox" class="empty-icon"></i>
              <div class="empty-text">
               Chưa có sách nào
              </div>
             </div></td>
           </tr>
          </tbody>
         </table>
        </div>
       </div>
      </div><!-- Categories View -->
      <div id="categories-view" style="display: none;">
       <div class="section-header">
        <div class="section-title">
         Danh mục sách
        </div>
       </div>
       <div style="background: rgba(30, 41, 59, 0.6); border: 1px solid rgba(51, 65, 85, 0.5); border-radius: 12px; padding: 40px; text-align: center; color: #64748b;"><i data-lucide="layers" style="width: 48px; height: 48px; margin: 0 auto 16px; color: rgba(100, 116, 139, 0.3);"></i>
        <p>Tính năng danh mục sẽ sớm ra mắt</p>
       </div>
      </div><!-- Reports View -->
      <div id="reports-view" style="display: none;">
       <div class="section-header">
        <div class="section-title">
         Báo cáo
        </div>
       </div>
       <div style="background: rgba(30, 41, 59, 0.6); border: 1px solid rgba(51, 65, 85, 0.5); border-radius: 12px; padding: 40px; text-align: center; color: #64748b;"><i data-lucide="chart-column" style="width: 48px; height: 48px; margin: 0 auto 16px; color: rgba(100, 116, 139, 0.3);"></i>
        <p>Tính năng báo cáo sẽ sớm ra mắt</p>
       </div>
      </div><!-- Settings View -->
      <div id="settings-view" style="display: none;">
       <div class="section-header">
        <div class="section-title">
         Cài đặt
        </div>
       </div>
       <div style="background: rgba(30, 41, 59, 0.6); border: 1px solid rgba(51, 65, 85, 0.5); border-radius: 12px; padding: 40px; text-align: center; color: #64748b;"><i data-lucide="sliders-horizontal" style="width: 48px; height: 48px; margin: 0 auto 16px; color: rgba(100, 116, 139, 0.3);"></i>
        <p>Tính năng cài đặt sẽ sớm ra mắt</p>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div><!-- Modal -->
  <div class="modal" id="bookModal">
   <div class="modal-content">
    <div class="modal-header">
     <div class="modal-title" id="modalTitle">
      Thêm sách mới
     </div><button class="close-btn" onclick="closeModal()"> <i data-lucide="x" style="width: 24px; height: 24px;"></i> </button>
    </div>
    <form id="bookForm" onsubmit="handleFormSubmit(event)">
     <div class="form-group"><label class="form-label">Tên sách *</label> <input type="text" class="form-input" id="bookTitle" required placeholder="Nhập tên sách">
     </div>
     <div class="form-group"><label class="form-label">Tác giả *</label> <input type="text" class="form-input" id="bookAuthor" required placeholder="Nhập tên tác giả">
     </div>
     <div class="form-group"><label class="form-label">Danh mục *</label> <select class="form-select" id="bookCategory" required> <option value="">-- Chọn danh mục --</option> <option value="fiction">Tiểu thuyết</option> <option value="nonfiction">Phi hư cấu</option> <option value="educational">Giáo dục</option> <option value="technical">Kỹ thuật</option> <option value="children">Trẻ em</option> </select>
     </div>
     <div class="form-group"><label class="form-label">Giá (đ) *</label> <input type="number" class="form-input" id="bookPrice" required placeholder="0" min="0">
     </div>
     <div class="form-group"><label class="form-label">Số lượng *</label> <input type="number" class="form-input" id="bookStock" required placeholder="0" min="0">
     </div>
     <div class="modal-footer"><button type="button" class="btn-secondary" onclick="closeModal()">Hủy</button> <button type="submit" class="btn-primary" id="submitBtn"> <span>Thêm sách</span> </button>
     </div>
    </form>
   </div>
  </div>
  <script src="/js/admin.js"></script>
 <script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9e28584784697aa1',t:'MTc3NDU1MTA2Ny4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>