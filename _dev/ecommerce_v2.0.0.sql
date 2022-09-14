-- phpMyAdmin SQL Dump

-- version 5.1.1

-- https://www.phpmyadmin.net/

--

-- Host: 127.0.0.1

-- Generation Time: Feb 01, 2022 at 07:02 PM

-- Server version: 10.4.22-MariaDB

-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--

-- Database: `ecommerce_v2`

--

-- --------------------------------------------------------

--

-- Table structure for table `cart`

--

CREATE TABLE `cart` (
    `cart_id` int(11) NOT NULL,
    `user_id` int(11) NOT NULL,
    `product_id` int(11) NOT NULL,
    `cart_created` datetime DEFAULT current_timestamp(),
    `cart_quantity` int(11) DEFAULT 1,
    `cart_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'cart'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--

-- Table structure for table `orders`

--

CREATE TABLE `orders` (
    `order_id` int(11) NOT NULL,
    `user_id` int(11) NOT NULL,
    `subtotal` decimal(7, 2) NOT NULL,
    `total` decimal(7, 2) NOT NULL,
    `total_discount_amount` decimal(7, 2) DEFAULT 0.00,
    `order_created` datetime DEFAULT current_timestamp(),
    `payment` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT 'none',
    `payment_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--

-- Table structure for table `order_details`

--

CREATE TABLE `order_details` (
    `order_details_id` int(11) NOT NULL,
    `order_id` int(11) NOT NULL,
    `product_id` int(11) NOT NULL,
    `order_details_price` decimal(7, 2) DEFAULT NULL,
    `order_details_quantity` int(11) DEFAULT 1,
    `order_details_created` datetime DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--

-- Table structure for table `products`

--

CREATE TABLE `products` (
    `product_id` int(11) NOT NULL,
    `product_title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `product_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `product_price` decimal(7, 2) DEFAULT NULL,
    `product_discount_amount` decimal(7, 2) DEFAULT 0.00,
    `product_quantity` int(11) DEFAULT NULL,
    `product_image1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `product_image2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `product_image3` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `product_image4` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `product_created` datetime DEFAULT current_timestamp(),
    `product_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `product_category` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--

-- Dumping data for table `products`

--

INSERT INTO
    `products` (
        `product_id`,
        `product_title`,
        `product_description`,
        `product_price`,
        `product_discount_amount`,
        `product_quantity`,
        `product_image1`,
        `product_image2`,
        `product_image3`,
        `product_image4`,
        `product_created`,
        `product_status`,
        `product_category`
    )
VALUES
    (
        1,
        'iPhone 13 Pro Max Graphite - 256GB',
        '                        <div class=\"dummy-description\">\r\n                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, maiores, facilis atque provident animi voluptate, architecto eos pariatur eligendi consectetur omnis? Totam fuga adipisci sequi vel quis temporibus, velit impedit soluta quasi at, quas nam deserunt laboriosam animi distinctio maiores deleniti? Exercitationem dolore, a in provident consectetur qui aliquid voluptate facere laudantium incidunt iure laboriosam perferendis quis perspiciatis hic reprehenderit nobis iste? Tempora eaque vero suscipit debitis. Sapiente magnam natus unde nobis aperiam labore libero perferendis illo voluptas perspiciatis non ipsa eligendi animi nisi maxime, alias harum vitae asperiores cum quis. Culpa perspiciatis vitae necessitatibus ipsam accusamus voluptate tempore provident unde accusantium nihil sit repellendus ad magnam, nulla iusto, distinctio autem, veritatis totam vel nobis id mollitia! Sunt obcaecati magnam deserunt nostrum adipisci cupiditate consectetur voluptatibus, similique corrupti. Quas porro laborum expedita eos odit maxime, incidunt deserunt ducimus sapiente delectus, fugiat neque at consequuntur excepturi praesentium quod maiores dicta ullam voluptate dolor autem commodi officiis. Dicta consequuntur molestiae odio quae quis obcaecati totam asperiores eligendi ducimus minus sunt laborum, nesciunt numquam sed voluptate corrupti ipsam illo nobis blanditiis vel aut.</p>\r\n                            <p><b>Lorem ipsum, dolor sit amet consectetur adipisicing.</b></p>\r\n                            <ul>\r\n                                <li>Lorem ipsum dolor sit amet.</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, sint.</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, sint.</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, vero! Error beatae nisi deserunt exercitationem reprehenderit natus, harum non repellat.</li>\r\n                            </ul>\r\n                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci quod rem ab suscipit asperiores. Molestiae vitae reiciendis incidunt. Animi id perspiciatis deleniti omnis unde consequatur quo perferendis voluptas commodi. Assumenda?</p>\r\n                        </div>',
        '1199.00',
        '0.00',
        100,
        'images/products/iphone1-1.jpg',
        'images/products/iphone1-2.jpg',
        'images/products/iphone1-3.jpg',
        'images/products/iphone1-4.jpg',
        '2021-12-18 17:07:56',
        'available',
        'Graphite'
    ),
    (
        2,
        'iPhone 13 Pro Max Silver - 256GB',
        '                        <div class=\"dummy-description\">\r\n                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, maiores, facilis atque provident animi voluptate, architecto eos pariatur eligendi consectetur omnis? Totam fuga adipisci sequi vel quis temporibus, velit impedit soluta quasi at, quas nam deserunt laboriosam animi distinctio maiores deleniti? Exercitationem dolore, a in provident consectetur qui aliquid voluptate facere laudantium incidunt iure laboriosam perferendis quis perspiciatis hic reprehenderit nobis iste? Tempora eaque vero suscipit debitis. Sapiente magnam natus unde nobis aperiam labore libero perferendis illo voluptas perspiciatis non ipsa eligendi animi nisi maxime, alias harum vitae asperiores cum quis. Culpa perspiciatis vitae necessitatibus ipsam accusamus voluptate tempore provident unde accusantium nihil sit repellendus ad magnam, nulla iusto, distinctio autem, veritatis totam vel nobis id mollitia! Sunt obcaecati magnam deserunt nostrum adipisci cupiditate consectetur voluptatibus, similique corrupti. Quas porro laborum expedita eos odit maxime, incidunt deserunt ducimus sapiente delectus, fugiat neque at consequuntur excepturi praesentium quod maiores dicta ullam voluptate dolor autem commodi officiis. Dicta consequuntur molestiae odio quae quis obcaecati totam asperiores eligendi ducimus minus sunt laborum, nesciunt numquam sed voluptate corrupti ipsam illo nobis blanditiis vel aut.</p>\r\n                            <p><b>Lorem ipsum, dolor sit amet consectetur adipisicing.</b></p>\r\n                            <ul>\r\n                                <li>Lorem ipsum dolor sit amet.</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, sint.</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, sint.</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, vero! Error beatae nisi deserunt exercitationem reprehenderit natus, harum non repellat.</li>\r\n                            </ul>\r\n                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci quod rem ab suscipit asperiores. Molestiae vitae reiciendis incidunt. Animi id perspiciatis deleniti omnis unde consequatur quo perferendis voluptas commodi. Assumenda?</p>\r\n                        </div>',
        '1199.00',
        '0.00',
        100,
        'images/products/iphone1-1.jpg',
        'images/products/iphone1-2.jpg',
        'images/products/iphone1-3.jpg',
        'images/products/iphone1-4.jpg',
        '2021-12-18 17:29:01',
        'in stock',
        'Silver'
    ),
    (
        3,
        'iPhone 13 Pro Graphite - 256GB',
        '                        <div class=\"dummy-description\">\r\n                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, maiores, facilis atque provident animi voluptate, architecto eos pariatur eligendi consectetur omnis? Totam fuga adipisci sequi vel quis temporibus, velit impedit soluta quasi at, quas nam deserunt laboriosam animi distinctio maiores deleniti? Exercitationem dolore, a in provident consectetur qui aliquid voluptate facere laudantium incidunt iure laboriosam perferendis quis perspiciatis hic reprehenderit nobis iste? Tempora eaque vero suscipit debitis. Sapiente magnam natus unde nobis aperiam labore libero perferendis illo voluptas perspiciatis non ipsa eligendi animi nisi maxime, alias harum vitae asperiores cum quis. Culpa perspiciatis vitae necessitatibus ipsam accusamus voluptate tempore provident unde accusantium nihil sit repellendus ad magnam, nulla iusto, distinctio autem, veritatis totam vel nobis id mollitia! Sunt obcaecati magnam deserunt nostrum adipisci cupiditate consectetur voluptatibus, similique corrupti. Quas porro laborum expedita eos odit maxime, incidunt deserunt ducimus sapiente delectus, fugiat neque at consequuntur excepturi praesentium quod maiores dicta ullam voluptate dolor autem commodi officiis. Dicta consequuntur molestiae odio quae quis obcaecati totam asperiores eligendi ducimus minus sunt laborum, nesciunt numquam sed voluptate corrupti ipsam illo nobis blanditiis vel aut.</p>\r\n                            <p><b>Lorem ipsum, dolor sit amet consectetur adipisicing.</b></p>\r\n                            <ul>\r\n                                <li>Lorem ipsum dolor sit amet.</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, sint.</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, sint.</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, vero! Error beatae nisi deserunt exercitationem reprehenderit natus, harum non repellat.</li>\r\n                            </ul>\r\n                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci quod rem ab suscipit asperiores. Molestiae vitae reiciendis incidunt. Animi id perspiciatis deleniti omnis unde consequatur quo perferendis voluptas commodi. Assumenda?</p>\r\n                        </div>',
        '1099.00',
        '0.00',
        100,
        'images/products/iphone1-2.jpg',
        'images/products/iphone1-1.jpg',
        'images/products/iphone1-3.jpg',
        'images/products/iphone1-4.jpg',
        '2021-12-18 17:32:20',
        'in stock',
        'Graphite'
    ),
    (
        4,
        'iPhone 13 Pro Gold - 256GB',
        '                        <div class=\"dummy-description\">\r\n                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, maiores, facilis atque provident animi voluptate, architecto eos pariatur eligendi consectetur omnis? Totam fuga adipisci sequi vel quis temporibus, velit impedit soluta quasi at, quas nam deserunt laboriosam animi distinctio maiores deleniti? Exercitationem dolore, a in provident consectetur qui aliquid voluptate facere laudantium incidunt iure laboriosam perferendis quis perspiciatis hic reprehenderit nobis iste? Tempora eaque vero suscipit debitis. Sapiente magnam natus unde nobis aperiam labore libero perferendis illo voluptas perspiciatis non ipsa eligendi animi nisi maxime, alias harum vitae asperiores cum quis. Culpa perspiciatis vitae necessitatibus ipsam accusamus voluptate tempore provident unde accusantium nihil sit repellendus ad magnam, nulla iusto, distinctio autem, veritatis totam vel nobis id mollitia! Sunt obcaecati magnam deserunt nostrum adipisci cupiditate consectetur voluptatibus, similique corrupti. Quas porro laborum expedita eos odit maxime, incidunt deserunt ducimus sapiente delectus, fugiat neque at consequuntur excepturi praesentium quod maiores dicta ullam voluptate dolor autem commodi officiis. Dicta consequuntur molestiae odio quae quis obcaecati totam asperiores eligendi ducimus minus sunt laborum, nesciunt numquam sed voluptate corrupti ipsam illo nobis blanditiis vel aut.</p>\r\n                            <p><b>Lorem ipsum, dolor sit amet consectetur adipisicing.</b></p>\r\n                            <ul>\r\n                                <li>Lorem ipsum dolor sit amet.</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, sint.</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, sint.</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, vero! Error beatae nisi deserunt exercitationem reprehenderit natus, harum non repellat.</li>\r\n                            </ul>\r\n                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci quod rem ab suscipit asperiores. Molestiae vitae reiciendis incidunt. Animi id perspiciatis deleniti omnis unde consequatur quo perferendis voluptas commodi. Assumenda?</p>\r\n                        </div>',
        '1099.00',
        '0.00',
        100,
        'images/products/iphone1-3.jpg',
        'images/products/iphone1-1.jpg',
        'images/products/iphone1-2.jpg',
        'images/products/iphone1-4.jpg',
        '2021-12-18 17:41:20',
        'in stock',
        'Gold'
    ),
    (
        5,
        'iPhone 12 Red - 256GB',
        '                        <div class=\"dummy-description\">\r\n                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, maiores, facilis atque provident animi voluptate, architecto eos pariatur eligendi consectetur omnis? Totam fuga adipisci sequi vel quis temporibus, velit impedit soluta quasi at, quas nam deserunt laboriosam animi distinctio maiores deleniti? Exercitationem dolore, a in provident consectetur qui aliquid voluptate facere laudantium incidunt iure laboriosam perferendis quis perspiciatis hic reprehenderit nobis iste? Tempora eaque vero suscipit debitis. Sapiente magnam natus unde nobis aperiam labore libero perferendis illo voluptas perspiciatis non ipsa eligendi animi nisi maxime, alias harum vitae asperiores cum quis. Culpa perspiciatis vitae necessitatibus ipsam accusamus voluptate tempore provident unde accusantium nihil sit repellendus ad magnam, nulla iusto, distinctio autem, veritatis totam vel nobis id mollitia! Sunt obcaecati magnam deserunt nostrum adipisci cupiditate consectetur voluptatibus, similique corrupti. Quas porro laborum expedita eos odit maxime, incidunt deserunt ducimus sapiente delectus, fugiat neque at consequuntur excepturi praesentium quod maiores dicta ullam voluptate dolor autem commodi officiis. Dicta consequuntur molestiae odio quae quis obcaecati totam asperiores eligendi ducimus minus sunt laborum, nesciunt numquam sed voluptate corrupti ipsam illo nobis blanditiis vel aut.</p>\r\n                            <p><b>Lorem ipsum, dolor sit amet consectetur adipisicing.</b></p>\r\n                            <ul>\r\n                                <li>Lorem ipsum dolor sit amet.</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, sint.</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, sint.</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, vero! Error beatae nisi deserunt exercitationem reprehenderit natus, harum non repellat.</li>\r\n                            </ul>\r\n                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci quod rem ab suscipit asperiores. Molestiae vitae reiciendis incidunt. Animi id perspiciatis deleniti omnis unde consequatur quo perferendis voluptas commodi. Assumenda?</p>\r\n                        </div>',
        '849.00',
        '0.00',
        100,
        'images/products/iphone1-3.jpg',
        'images/products/iphone1-1.jpg',
        'images/products/iphone1-2.jpg',
        'images/products/iphone1-4.jpg',
        '2021-12-18 17:44:33',
        'in stock',
        'Red'
    ),
    (
        6,
        'iPhone 12 Mini Purple - 128GB',
        '                        <div class=\"dummy-description\">\r\n                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, maiores, facilis atque provident animi voluptate, architecto eos pariatur eligendi consectetur omnis? Totam fuga adipisci sequi vel quis temporibus, velit impedit soluta quasi at, quas nam deserunt laboriosam animi distinctio maiores deleniti? Exercitationem dolore, a in provident consectetur qui aliquid voluptate facere laudantium incidunt iure laboriosam perferendis quis perspiciatis hic reprehenderit nobis iste? Tempora eaque vero suscipit debitis. Sapiente magnam natus unde nobis aperiam labore libero perferendis illo voluptas perspiciatis non ipsa eligendi animi nisi maxime, alias harum vitae asperiores cum quis. Culpa perspiciatis vitae necessitatibus ipsam accusamus voluptate tempore provident unde accusantium nihil sit repellendus ad magnam, nulla iusto, distinctio autem, veritatis totam vel nobis id mollitia! Sunt obcaecati magnam deserunt nostrum adipisci cupiditate consectetur voluptatibus, similique corrupti. Quas porro laborum expedita eos odit maxime, incidunt deserunt ducimus sapiente delectus, fugiat neque at consequuntur excepturi praesentium quod maiores dicta ullam voluptate dolor autem commodi officiis. Dicta consequuntur molestiae odio quae quis obcaecati totam asperiores eligendi ducimus minus sunt laborum, nesciunt numquam sed voluptate corrupti ipsam illo nobis blanditiis vel aut.</p>\r\n                            <p><b>Lorem ipsum, dolor sit amet consectetur adipisicing.</b></p>\r\n                            <ul>\r\n                                <li>Lorem ipsum dolor sit amet.</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, sint.</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, sint.</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, vero! Error beatae nisi deserunt exercitationem reprehenderit natus, harum non repellat.</li>\r\n                            </ul>\r\n                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci quod rem ab suscipit asperiores. Molestiae vitae reiciendis incidunt. Animi id perspiciatis deleniti omnis unde consequatur quo perferendis voluptas commodi. Assumenda?</p>\r\n                        </div>649.00',
        '649.00',
        '0.00',
        100,
        'images/products/iphone1-2.jpg',
        'images/products/iphone1-1.jpg',
        'images/products/iphone1-3.jpg',
        'images/products/iphone1-4.jpg',
        '2021-12-18 17:47:42',
        'in stock',
        'Purple'
    ),
    (
        7,
        'iPhone Test',
        '                        <div class=\"dummy-description\">\r\n                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, maiores, facilis atque provident animi voluptate, architecto eos pariatur eligendi consectetur omnis? Totam fuga adipisci sequi vel quis temporibus, velit impedit soluta quasi at, quas nam deserunt laboriosam animi distinctio maiores deleniti? Exercitationem dolore, a in provident consectetur qui aliquid voluptate facere laudantium incidunt iure laboriosam perferendis quis perspiciatis hic reprehenderit nobis iste? Tempora eaque vero suscipit debitis. Sapiente magnam natus unde nobis aperiam labore libero perferendis illo voluptas perspiciatis non ipsa eligendi animi nisi maxime, alias harum vitae asperiores cum quis. Culpa perspiciatis vitae necessitatibus ipsam accusamus voluptate tempore provident unde accusantium nihil sit repellendus ad magnam, nulla iusto, distinctio autem, veritatis totam vel nobis id mollitia! Sunt obcaecati magnam deserunt nostrum adipisci cupiditate consectetur voluptatibus, similique corrupti. Quas porro laborum expedita eos odit maxime, incidunt deserunt ducimus sapiente delectus, fugiat neque at consequuntur excepturi praesentium quod maiores dicta ullam voluptate dolor autem commodi officiis. Dicta consequuntur molestiae odio quae quis obcaecati totam asperiores eligendi ducimus minus sunt laborum, nesciunt numquam sed voluptate corrupti ipsam illo nobis blanditiis vel aut.</p>\r\n                            <p><b>Lorem ipsum, dolor sit amet consectetur adipisicing.</b></p>\r\n                            <ul>\r\n                                <li>Lorem ipsum dolor sit amet.</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, sint.</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, sint.</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat</li>\r\n                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, vero! Error beatae nisi deserunt exercitationem reprehenderit natus, harum non repellat.</li>\r\n                            </ul>\r\n                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci quod rem ab suscipit asperiores. Molestiae vitae reiciendis incidunt. Animi id perspiciatis deleniti omnis unde consequatur quo perferendis voluptas commodi. Assumenda?</p>\r\n                        </div>649.00',
        '17.00',
        '0.00',
        100,
        'images/products/iphone1-2.jpg',
        'images/products/iphone1-1.jpg',
        'images/products/iphone1-3.jpg',
        'images/products/iphone1-4.jpg',
        '2021-12-18 17:47:42',
        'in stock',
        'Purple'
    );

-- --------------------------------------------------------

--

-- Table structure for table `test`

--

CREATE TABLE `test` (
    `id` int(11) NOT NULL,
    `first_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `last_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `date_done` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--

-- Table structure for table `users`

--

CREATE TABLE `users` (
    `user_id` int(11) NOT NULL,
    `first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `password` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `user_created` datetime DEFAULT current_timestamp(),
    `user_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'user'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--

-- Indexes for dumped tables

--

--

-- Indexes for table `cart`

--

ALTER TABLE `cart` ADD PRIMARY KEY (`cart_id`);

--

-- Indexes for table `orders`

--

ALTER TABLE `orders` ADD PRIMARY KEY (`order_id`);

--

-- Indexes for table `order_details`

--

ALTER TABLE `order_details` ADD PRIMARY KEY (`order_details_id`);

--

-- Indexes for table `products`

--

ALTER TABLE `products` ADD PRIMARY KEY (`product_id`);

--

-- Indexes for table `test`

--

ALTER TABLE `test` ADD PRIMARY KEY (`id`);

--

-- Indexes for table `users`

--

ALTER TABLE
    `users`
ADD
    PRIMARY KEY (`user_id`),
ADD
    UNIQUE KEY `email_UNIQUE` (`email`);

--

-- AUTO_INCREMENT for dumped tables

--

--

-- AUTO_INCREMENT for table `cart`

--

ALTER TABLE
    `cart`
MODIFY
    `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--

-- AUTO_INCREMENT for table `orders`

--

ALTER TABLE
    `orders`
MODIFY
    `order_id` int(11) NOT NULL AUTO_INCREMENT;

--

-- AUTO_INCREMENT for table `order_details`

--

ALTER TABLE
    `order_details`
MODIFY
    `order_details_id` int(11) NOT NULL AUTO_INCREMENT;

--

-- AUTO_INCREMENT for table `products`

--

ALTER TABLE
    `products`
MODIFY
    `product_id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 8;

--

-- AUTO_INCREMENT for table `test`

--

ALTER TABLE `test` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--

-- AUTO_INCREMENT for table `users`

--

ALTER TABLE
    `users`
MODIFY
    `user_id` int(11) NOT NULL AUTO_INCREMENT;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */

;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */

;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */

;