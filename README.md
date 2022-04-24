
<div align="center"> 
    <h1>EF FRAMEWORK</h1>
    <img src="img_resources/ef_framework.png" alt="Ef Screenshoot">
    <br>
    <br>
    <h2>This is simple, fast and minimal PHP MVC Framework.</h2>
</div>
<br>
<br>

![alt](img_resources/img01.png)

#### Serve project :
```console
php -S localhost:3000
```

####  Creating Controller :
```php
class Welcome extends Controller {
    public function __construct() {
        // operations...!
    }

    // methods
    public function index() {
        $data = [
            'title' => 'welcome',
        ];
        $this->view('pages/index', $data);
    }

    // other methods
    // /welcome/about/:id
    public function about($id) {
        $this->view('pages/about');
    }
}

```

#### Creating Model :
```php
<?php
class Post {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getPosts() {
        $this->db->query("SELECT * FROM post");

        return $this->db->setRes();
    }
}

```

#### Using model in controller :
```php
class Welcome extends Controller {
    public function __construct() {
        // load model
        $this->postModel = $this->model('Post');
    }

    public function index() {
        // get data from model
        $posts = $this->postModel->getPosts();
        $data = [
            'title' => 'welcome',
            'posts' => $posts
        ];

        // send data to view
        $this->view('pages/index', $data);
    }
}

```

#### Usage Data in View
```html
<div class="container">
    <h5>Test For Database Data</h5>
    <div>
        <ul>
            <?php foreach($data['posts'] as $post): ?>
                <li><?php echo $post->title; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
```

## LICENSE
MIT License

Copyright (c) 2022 Mehmet Ekemen

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.