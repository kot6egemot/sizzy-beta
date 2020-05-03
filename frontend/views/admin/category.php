<table class="table">
  <thead>
    <tr>
      <th scope="col">Идентификатор</th>
      <th scope="col">Назване</th>
      <th scope="col">Действия</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach($categories as $category): ?>
    <tr>
      <th><?= $category['id'] ?></th>
      <td><?= $category['title'] ?></td>
      <td>
          <div>
          <a class="btn btn-primary" href="/admin/category/update/<?= $category['id'] ?>">Изменить</a>
          </div>
      </td>
      <td>
            <div>
                <a class="btn btn-danger delete-template" style="cursor:pointer;">Удалить</a>
                <div class="alert-delete" style="display: none;">
                    <span>Вы действительно хотите удалить шаблон?</span>
                    <button class="btn btn-danger delete-true" data-id="<?= $category['id'] ?>" data-url="/admin/category-delete">Да</button>
                    <button class="btn btn-success delete-false">Нет</button>
                </div>
            </div>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>