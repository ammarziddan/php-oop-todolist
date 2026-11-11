<?php

namespace View {

    use Helper\InputHelper;
    use Service\TodolistService;

    class TodolistView
    {
        private TodolistService $todolistService;

        public function __construct(TodolistService $todolistService)
        {
            $this->todolistService = $todolistService;
        }

        public function showTodolist(): void
        {
            while (true) {
                $this->todolistService->showTodolist();

                echo "Menu" . PHP_EOL;
                echo "1. Tambah Todo" . PHP_EOL;
                echo "2. Hapus Todo" . PHP_EOL;
                echo "q. Keluar" . PHP_EOL;

                $pilihan = InputHelper::input("Pilih");

                if ($pilihan == 1) {
                    $this->addTodolist();
                } elseif ($pilihan == 2) {
                    $this->removeTodolist();
                } elseif (strtolower($pilihan) == 'q') {
                    break;
                } else {
                    echo "Pilihan tidak valid!" . PHP_EOL;
                }
            }

            echo "Selamat tinggal!" . PHP_EOL;
        }

        public function addTodolist(): void
        {
            echo "Tambah Todo" . PHP_EOL;

            $input = InputHelper::input("Todo (x. batal)");

            if ($input == 'x') {
                echo "Batal tambah todo list" . PHP_EOL;
            } else {
                $this->todolistService->addTodolist($input);
            }
        }

        public function removeTodolist(): void
        {
            echo "Menghapus Todo" . PHP_EOL;

            $pilihan = InputHelper::input("Nomor (x. batal)");

            if ($pilihan == 'x') {
                echo "Batal menghapus" . PHP_EOL;
            } elseif (!ctype_digit($pilihan)) {
                echo "Pilihan tidak valid" . PHP_EOL;
            } else {
                $this->todolistService->removeTodolist($pilihan);
            }
        }
    }
}
