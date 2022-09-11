<?php

declare(strict_types=1);

namespace App\Tests\Blog\Application;

use App\Blog\Application\CreateBlogPost\BlogPostCommand;
use App\Blog\Application\CreateBlogPost\BlogPostCommandHandler;
use App\Blog\Application\CreateBlogPost\BlogPostCreator;
use App\Blog\Domain\Entity\BlogPost;
use App\Blog\Infrastructure\Repository\InMemoryBlogPostRepository;
use App\Shared\Infrastructure\Entity\Uuid;
use PHPUnit\Framework\TestCase;

/**
 * Class CreateBlogPostTest.
 */
class CreateBlogPostTest extends TestCase
{
    /**
     * @return void
     */
    public function testIShouldInstantiateBlogPost(): void
    {
        $blogPost = $this->createBlogPost('Title test');

        $this->assertNotNull($blogPost);
    }

    /**
     * @return void
     */
    public function testIShouldSaveBlogPostToTheStore(): void
    {
        $repository = new InMemoryBlogPostRepository();
        $uuid = new Uuid();
        $commandHandler = new BlogPostCommandHandler(new BlogPostCreator($repository, $uuid));
        $blogPostCommand = new BlogPostCommand();
        $blogPostCommand->title = 'Test title';

        try {
            $commandHandler($blogPostCommand);
            $res = true;
        } catch (\Exception) {
            $res = false;
        }

        $this->assertTrue($res);
    }

    /**
     * @param string $title
     *
     * @return BlogPost
     */
    private function createBlogPost(string $title)
    {
        return BlogPost::blogPost(new Uuid(),$title);
    }
}
