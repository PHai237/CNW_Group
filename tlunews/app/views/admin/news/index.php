<?php include APP_ROOT . '/app/views/layouts/header.php'; ?>

<div class="container mt-4">
    <h2>Danh sách tin tức</h2>
    <a href="?controller=News&action=showAdd" class="btn btn-success mb-3">Thêm tin tức mới</a>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Danh mục</th>
                <th>Hình ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($newsList as $news): ?>
            <tr>
                <td><?= htmlspecialchars($news->getId()); ?></td>
                <td><?= htmlspecialchars($news->getTitle()); ?></td>
                <td><?= htmlspecialchars($news->getCategoryName()); ?></td>
                <td><img src="<?= DOMAIN . 'public/images/' . $news->getImage(); ?>" alt="News Image" style="width: 100px; height: 70px;"></td>
                <td>
                    <a href="?controller=News&action=edit&id=<?= $news->getId(); ?>" class="btn btn-warning btn-sm">Sửa</a>
                    
                    <form action="?controller=News&action=delete" method="POST" style="display:inline-block;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa tin tức này?');">
                        <input type="hidden" name="id" value="<?= $news->getId(); ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>
