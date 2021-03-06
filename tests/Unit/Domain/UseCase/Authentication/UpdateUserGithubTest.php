<?php
declare(strict_types=1);

namespace Test\Unit\Domain\UseCase\Authentication;

use Tests\TestCase;
use Mockery as M;
use App\Domain\Entity\User;
use App\Domain\ValueObject\UserId;
use App\Domain\Entity\UserGithub;
use App\Domain\ValueObject\GithubId;
use App\Domain\UseCase\Authentication\UpdateUserGithub;
use App\Domain\Specification\Authentication\UpdateUserGithubSpecification;

/**
 * Class UpdateUserGithubTest
 * @package Test\Unit\Domain\UseCase\Authentication
 */
class UpdateUserGithubTest extends TestCase
{
    /**
     * @var
     */
    private $useCase;
    
    /**
     * @var M\Mock|UpdateUserGithubSpecification
     */
    private $specification;
    
    public function setUp()
    {
        $this->specification = M::mock(UpdateUserGithubSpecification::class);
        $this->useCase = new UpdateUserGithub($this->specification);
    }
    
    public function testRun()
    {
        $entity = new UserGithub(new User(new UserId()), new GithubId('id'));
        $this->specification->shouldReceive('update')->andReturn(true);
        $result = $this->useCase->run($entity);
        $this->assertTrue($result);
    }
}
