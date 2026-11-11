<?php

namespace Repository {

    use Entity\Todolist;

    interface TodolistRepository
    {
        public function save(Todolist $todolist): void;

        public function remove(int $number): bool;

        public function findAll(): array;
    }

    class TodolistRepositoryImpl implements TodolistRepository
    {
        public array $todolist = [];

        public function save(Todolist $todolist): void
        {
            $number = count($this->todolist) + 1;
            $this->todolist[$number] = $todolist;
        }

        public function remove(int $number): bool
        {
            if ($number > count($this->todolist) || $number < 1) {
                return false;
            }

            for ($i = $number; $i < count($this->todolist); $i++) {
                $this->todolist[$i] = $this->todolist[$i + 1];
            }

            unset($this->todolist[count($this->todolist)]);

            return true;
        }

        public function findAll(): array
        {
            return $this->todolist;
        }
    }
}
