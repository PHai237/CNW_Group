<?php include APP_ROOT . '/app/views/layouts/header.php'; ?>
<style>
/* Thiết lập lại margin và padding cho tất cả phần tử */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
}

/* Container chính với chiều rộng giới hạn */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

/* Grid cho các bài viết */
.news-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    padding-top: 20px;
}

/* Phần tử tin tức */
.news-item {
    background-color: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.news-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

/* Hình ảnh thumbnail tin tức */
.news-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.news-item:hover .news-image {
    transform: scale(1.05);
}

/* Tiêu đề bài viết */
.news-title {
    font-size: 20px;
    font-weight: bold;
    color: #333;
    margin: 15px;
    line-height: 1.3;
    transition: color 0.3s ease;
}

.news-item:hover .news-title {
    color: #007bff;
}

/* Nội dung bài viết */
.news-content {
    font-size: 16px;
    color: #666;
    margin: 0 15px 20px;
    line-height: 1.6;
    height: 70px;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Nút đọc thêm */
.news-read-more {
    font-size: 14px;
    color: #007bff;
    text-decoration: none;
    margin: 0 15px 20px;
    transition: color 0.3s ease;
}

.news-read-more:hover {
    color: #0056b3;
    text-decoration: underline;
}

/* Đảm bảo độ phân giải hiển thị tốt trên di động */
@media (max-width: 768px) {
    .news-grid {
        grid-template-columns: 1fr;
    }

    .news-title {
        font-size: 18px;
    }

    .news-content {
        font-size: 14px;
    }
}

</style>

<div class="container mt-4">
    <div class="news-grid">
        <?php
        foreach ($newsList as $news) {
        ?>
            <div class="news-item">
                <img src="<?= DOMAIN.'public/images/'.$news->getImage() ?>" class="news-image" alt="Ảnh thumbnail tin tức">
                <h5 class="news-title"><?= $news->getTitle() ?></h5>
                <p class="news-content"><?= $news->getContent() ?></p>
                <a href="?controller=Home&action=detail&id=<?= $news->getId(); ?>" class="news-read-more" title="Đọc Thêm">Đọc Thêm</a>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>
