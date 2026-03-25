let books = [];

async function api(data) {
    try {
        const response = await fetch("/api/products", {
            method: "POST",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
            },
            body: new URLSearchParams(data),
        });

        if (!response.ok) {
            // Try to parse error response
            let errorMessage = `HTTP error! status: ${response.status}`;
            try {
                const errorData = await response.json();
                if (errorData.errors) {
                    errorMessage = Object.values(errorData.errors).flat().join(', ');
                } else if (errorData.error) {
                    errorMessage = errorData.error;
                }
            } catch (e) {
                // Ignore if can't parse
            }
            throw new Error(errorMessage);
        }

        return await response.json();
    } catch (error) {
        console.error('API error:', error);
        alert('Có lỗi xảy ra: ' + error.message);
        throw error;
    }
}

async function load() {
    try {
        const table = document.getElementById("table");
        table.innerHTML = '<tr><td colspan="7" class="px-6 py-4 text-center"><i class="fas fa-spinner fa-spin mr-2"></i>Loading books...</td></tr>';

        books = await api({ action: "get" });
        render();
    } catch (error) {
        console.error('Load error:', error);
        document.getElementById("table").innerHTML = '<tr><td colspan="7" class="px-6 py-4 text-center text-red-600"><i class="fas fa-exclamation-circle mr-2"></i>Error loading books</td></tr>';
    }
}

function render() {
    const tb = document.getElementById("table");
    tb.innerHTML = "";

    let total = books.length;
    let value = 0,
        instock = 0,
        out = 0;

    books.forEach((b) => {
        value += b.price * b.stock;
        if (b.stock > 0) instock++;
        else out++;

        const statusClass = b.stock > 0 ? 'text-emerald-600 bg-emerald-100' : 'text-red-600 bg-red-100';
        const statusIcon = b.stock > 0 ? 'fa-check-circle' : 'fa-times-circle';

        tb.innerHTML += `
<tr class="hover:bg-gray-50 transition-colors">
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${b.title}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${b.author}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
            ${b.category}
        </span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${Number(b.price).toLocaleString()} đ</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${b.stock}</td>
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ${statusClass}">
            <i class="fas ${statusIcon} mr-1"></i>
            ${b.stock > 0 ? "In Stock" : "Out of Stock"}
        </span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
        <button onclick='edit(${JSON.stringify(b)})' class="text-indigo-600 hover:text-indigo-900 mr-3 transition-colors">
            <i class="fas fa-edit mr-1"></i>Edit
        </button>
        <button onclick='del(${b.id})' class="text-red-600 hover:text-red-900 transition-colors">
            <i class="fas fa-trash mr-1"></i>Delete
        </button>
    </td>
</tr>`;
    });

    document.getElementById("total").innerText = total;
    document.getElementById("value").innerText = value.toLocaleString() + " đ";
    document.getElementById("in").innerText = instock;
    document.getElementById("out").innerText = out;
}

async function save() {
    // Client-side validation
    const title = document.getElementById("title").value.trim();
    const author = document.getElementById("author").value.trim();
    const category = document.getElementById("category").value.trim();
    const price = document.getElementById("price").value;
    const stock = document.getElementById("stock").value;

    if (!title || !author || !category || !price || !stock) {
        alert('Vui lòng điền đầy đủ thông tin!');
        return;
    }

    if (isNaN(price) || price <= 0) {
        alert('Giá phải là số dương!');
        return;
    }

    if (isNaN(stock) || stock < 0) {
        alert('Số lượng phải là số không âm!');
        return;
    }

    try {
        const saveBtn = document.getElementById("saveBtn");
        const originalText = saveBtn.innerHTML;
        saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Saving...';
        saveBtn.disabled = true;

        const id = document.getElementById("id").value;

        await api({
            action: id ? "update" : "create",
            id,
            title,
            author,
            category,
            price,
            stock,
        });

        showMessage('Book saved successfully!', 'success');
        resetForm();
        load();

        saveBtn.innerHTML = originalText;
        saveBtn.disabled = false;
    } catch (error) {
        console.error('Save error:', error);
        showMessage('Error saving book: ' + error.message, 'error');
        document.getElementById("saveBtn").innerHTML = '<i class="fas fa-save mr-2"></i>Save Book';
        document.getElementById("saveBtn").disabled = false;
    }
}

function edit(b) {
    document.getElementById("id").value = b.id;
    document.getElementById("title").value = b.title;
    document.getElementById("author").value = b.author;
    document.getElementById("category").value = b.category;
    document.getElementById("price").value = b.price;
    document.getElementById("stock").value = b.stock;
}

async function del(id) {
    if (confirm("Are you sure you want to delete this book?")) {
        try {
            await api({ action: "delete", id });
            showMessage('Book deleted successfully!', 'success');
            load();
        } catch (error) {
            console.error('Delete error:', error);
            showMessage('Error deleting book: ' + error.message, 'error');
        }
    }
}

function showMessage(message, type) {
    const msgDiv = document.getElementById("message");
    msgDiv.className = `mb-4 p-4 rounded-lg ${type === 'success' ? 'bg-green-100 text-green-800 border border-green-200' : 'bg-red-100 text-red-800 border border-red-200'}`;
    msgDiv.innerHTML = `<i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'} mr-2"></i>${message}`;
    msgDiv.classList.remove('hidden');
    setTimeout(() => msgDiv.classList.add('hidden'), 5000);
}

function resetForm() {
    document.querySelectorAll("input").forEach((i) => (i.value = ""));
}

load();
