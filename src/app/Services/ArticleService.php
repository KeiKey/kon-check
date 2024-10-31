<?php

namespace App\Services;

use App\Models\Article\Article;

class ArticleService
{
    /**
     * Create a new Article.
     *
     * @param array $data
     * @return Article
     */
    public function createArticle(array $data): Article
    {
        /** @var Article $company */
        $company = Article::query()->create([
            'name'          => $data['name'],
            'email'         => $data['email'],
            'address'       => $data['address'],
            'vat_number'    => $data['vat_number'],
            'contact_name'  => $data['contact_name'],
            'contact_phone' => $data['contact_phone'],
            'contact_email' => $data['contact_email'],
        ]);

        return $company;
    }

    /**
     * Update an existing Article.
     *
     * @param Article $company
     * @param array $data
     * @return Article
     */
    public function updateArticle(Article $company, array $data): Article
    {
        $company->update([
            'name'          => $data['name'],
            'email'         => $data['email'],
            'address'       => $data['address'],
            'vat_number'    => $data['vat_number'],
            'contact_name'  => $data['contact_name'],
            'contact_phone' => $data['contact_phone'],
            'contact_email' => $data['contact_email'],
        ]);

        return $company;
    }

    /**
     * Delete a Article.
     *
     * @param Article $company
     * @return Article
     */
    public function deleteArticle(Article $company): Article
    {
        $company->delete();

        return $company;
    }
}
