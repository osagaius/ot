<?php

namespace OT\BackendBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TeacherRepository extends EntityRepository
{
	public function getTeacherBalanceSum()
	{
		return $this->getEntityManager()->createQueryBuilder()
			->select('SUM(t.account_balance)')
			->from('OTBackendBundle:Teacher','t')
			->where('t.roles = :roles1 OR t.roles = :roles2')
			->setParameter('roles1','ADMIN')
			->setParameter('roles2','TEACHER')
			->getQuery()->getSingleResult();
	}

	public function getTeacherNumber()
	{
		return $this->getEntityManager()->createQueryBuilder()
			->select('COUNT(t)')
			->from('OTBackendBundle:Teacher','t')
			->where('t.roles = :roles1 OR t.roles = :roles2')
			->setParameter('roles1','TEACHER')
			->setParameter('roles2','ADMIN')
			->getQuery()->getSingleResult();
	}

	public function getAdminNumber()
	{
		return $this->getEntityManager()->createQueryBuilder()
			->select('COUNT(a)')
			->from('OTBackendBundle:Teacher','a')
			->where('a.roles = :roles')
			->setParameter('roles','ADMIN')
			->getQuery()->getSingleResult();
	}

	public function getTeacherList()
	{
		return $this->getEntityManager()->createQueryBuilder()
			->select('t')
			->from('OTBackendBundle:Teacher','t')
			->where('t.roles = :roles1 OR t.roles = :roles2')
			->setParameter('roles1','TEACHER')
			->setParameter('roles2','ADMIN')
			->getQuery()->getResult();
	}
}
