<?php


/**
 * Base class that represents a query for the 'jobeet_category_affiliate' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.3 on:
 *
 * Sun Jan 22 15:53:04 2012
 *
 * @method     JobeetCategoryAffiliateQuery orderByCategoryId($order = Criteria::ASC) Order by the category_id column
 * @method     JobeetCategoryAffiliateQuery orderByAffiliateId($order = Criteria::ASC) Order by the affiliate_id column
 *
 * @method     JobeetCategoryAffiliateQuery groupByCategoryId() Group by the category_id column
 * @method     JobeetCategoryAffiliateQuery groupByAffiliateId() Group by the affiliate_id column
 *
 * @method     JobeetCategoryAffiliateQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     JobeetCategoryAffiliateQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     JobeetCategoryAffiliateQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     JobeetCategoryAffiliateQuery leftJoinJobeetCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the JobeetCategory relation
 * @method     JobeetCategoryAffiliateQuery rightJoinJobeetCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JobeetCategory relation
 * @method     JobeetCategoryAffiliateQuery innerJoinJobeetCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the JobeetCategory relation
 *
 * @method     JobeetCategoryAffiliateQuery leftJoinJobeetAffiliate($relationAlias = null) Adds a LEFT JOIN clause to the query using the JobeetAffiliate relation
 * @method     JobeetCategoryAffiliateQuery rightJoinJobeetAffiliate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JobeetAffiliate relation
 * @method     JobeetCategoryAffiliateQuery innerJoinJobeetAffiliate($relationAlias = null) Adds a INNER JOIN clause to the query using the JobeetAffiliate relation
 *
 * @method     JobeetCategoryAffiliate findOne(PropelPDO $con = null) Return the first JobeetCategoryAffiliate matching the query
 * @method     JobeetCategoryAffiliate findOneOrCreate(PropelPDO $con = null) Return the first JobeetCategoryAffiliate matching the query, or a new JobeetCategoryAffiliate object populated from the query conditions when no match is found
 *
 * @method     JobeetCategoryAffiliate findOneByCategoryId(int $category_id) Return the first JobeetCategoryAffiliate filtered by the category_id column
 * @method     JobeetCategoryAffiliate findOneByAffiliateId(int $affiliate_id) Return the first JobeetCategoryAffiliate filtered by the affiliate_id column
 *
 * @method     array findByCategoryId(int $category_id) Return JobeetCategoryAffiliate objects filtered by the category_id column
 * @method     array findByAffiliateId(int $affiliate_id) Return JobeetCategoryAffiliate objects filtered by the affiliate_id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseJobeetCategoryAffiliateQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseJobeetCategoryAffiliateQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'JobeetCategoryAffiliate', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new JobeetCategoryAffiliateQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    JobeetCategoryAffiliateQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof JobeetCategoryAffiliateQuery) {
			return $criteria;
		}
		$query = new JobeetCategoryAffiliateQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key.
	 * Propel uses the instance pool to skip the database if the object exists.
	 * Go fast if the query is untouched.
	 *
	 * <code>
	 * $obj = $c->findPk(array(12, 34), $con);
	 * </code>
	 *
	 * @param     array[$category_id, $affiliate_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    JobeetCategoryAffiliate|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = JobeetCategoryAffiliatePeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(JobeetCategoryAffiliatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		if ($this->formatter || $this->modelAlias || $this->with || $this->select
		 || $this->selectColumns || $this->asColumns || $this->selectModifiers
		 || $this->map || $this->having || $this->joins) {
			return $this->findPkComplex($key, $con);
		} else {
			return $this->findPkSimple($key, $con);
		}
	}

	/**
	 * Find object by primary key using raw SQL to go fast.
	 * Bypass doSelect() and the object formatter by using generated code.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    JobeetCategoryAffiliate A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `CATEGORY_ID`, `AFFILIATE_ID` FROM `jobeet_category_affiliate` WHERE `CATEGORY_ID` = :p0 AND `AFFILIATE_ID` = :p1';
		try {
			$stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
			$stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new JobeetCategoryAffiliate();
			$obj->hydrate($row);
			JobeetCategoryAffiliatePeer::addInstanceToPool($obj, serialize(array((string) $row[0], (string) $row[1])));
		}
		$stmt->closeCursor();

		return $obj;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    JobeetCategoryAffiliate|array|mixed the result, formatted by the current formatter
	 */
	protected function findPkComplex($key, $con)
	{
		// As the query uses a PK condition, no limit(1) is necessary.
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKey($key)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKeys($keys)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->format($stmt);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    JobeetCategoryAffiliateQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(JobeetCategoryAffiliatePeer::CATEGORY_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(JobeetCategoryAffiliatePeer::AFFILIATE_ID, $key[1], Criteria::EQUAL);

		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    JobeetCategoryAffiliateQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(JobeetCategoryAffiliatePeer::CATEGORY_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(JobeetCategoryAffiliatePeer::AFFILIATE_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}

		return $this;
	}

	/**
	 * Filter the query on the category_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCategoryId(1234); // WHERE category_id = 1234
	 * $query->filterByCategoryId(array(12, 34)); // WHERE category_id IN (12, 34)
	 * $query->filterByCategoryId(array('min' => 12)); // WHERE category_id > 12
	 * </code>
	 *
	 * @see       filterByJobeetCategory()
	 *
	 * @param     mixed $categoryId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JobeetCategoryAffiliateQuery The current query, for fluid interface
	 */
	public function filterByCategoryId($categoryId = null, $comparison = null)
	{
		if (is_array($categoryId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(JobeetCategoryAffiliatePeer::CATEGORY_ID, $categoryId, $comparison);
	}

	/**
	 * Filter the query on the affiliate_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAffiliateId(1234); // WHERE affiliate_id = 1234
	 * $query->filterByAffiliateId(array(12, 34)); // WHERE affiliate_id IN (12, 34)
	 * $query->filterByAffiliateId(array('min' => 12)); // WHERE affiliate_id > 12
	 * </code>
	 *
	 * @see       filterByJobeetAffiliate()
	 *
	 * @param     mixed $affiliateId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JobeetCategoryAffiliateQuery The current query, for fluid interface
	 */
	public function filterByAffiliateId($affiliateId = null, $comparison = null)
	{
		if (is_array($affiliateId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(JobeetCategoryAffiliatePeer::AFFILIATE_ID, $affiliateId, $comparison);
	}

	/**
	 * Filter the query by a related JobeetCategory object
	 *
	 * @param     JobeetCategory|PropelCollection $jobeetCategory The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JobeetCategoryAffiliateQuery The current query, for fluid interface
	 */
	public function filterByJobeetCategory($jobeetCategory, $comparison = null)
	{
		if ($jobeetCategory instanceof JobeetCategory) {
			return $this
				->addUsingAlias(JobeetCategoryAffiliatePeer::CATEGORY_ID, $jobeetCategory->getId(), $comparison);
		} elseif ($jobeetCategory instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(JobeetCategoryAffiliatePeer::CATEGORY_ID, $jobeetCategory->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByJobeetCategory() only accepts arguments of type JobeetCategory or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the JobeetCategory relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    JobeetCategoryAffiliateQuery The current query, for fluid interface
	 */
	public function joinJobeetCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('JobeetCategory');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'JobeetCategory');
		}

		return $this;
	}

	/**
	 * Use the JobeetCategory relation JobeetCategory object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    JobeetCategoryQuery A secondary query class using the current class as primary query
	 */
	public function useJobeetCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinJobeetCategory($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'JobeetCategory', 'JobeetCategoryQuery');
	}

	/**
	 * Filter the query by a related JobeetAffiliate object
	 *
	 * @param     JobeetAffiliate|PropelCollection $jobeetAffiliate The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JobeetCategoryAffiliateQuery The current query, for fluid interface
	 */
	public function filterByJobeetAffiliate($jobeetAffiliate, $comparison = null)
	{
		if ($jobeetAffiliate instanceof JobeetAffiliate) {
			return $this
				->addUsingAlias(JobeetCategoryAffiliatePeer::AFFILIATE_ID, $jobeetAffiliate->getId(), $comparison);
		} elseif ($jobeetAffiliate instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(JobeetCategoryAffiliatePeer::AFFILIATE_ID, $jobeetAffiliate->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByJobeetAffiliate() only accepts arguments of type JobeetAffiliate or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the JobeetAffiliate relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    JobeetCategoryAffiliateQuery The current query, for fluid interface
	 */
	public function joinJobeetAffiliate($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('JobeetAffiliate');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'JobeetAffiliate');
		}

		return $this;
	}

	/**
	 * Use the JobeetAffiliate relation JobeetAffiliate object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    JobeetAffiliateQuery A secondary query class using the current class as primary query
	 */
	public function useJobeetAffiliateQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinJobeetAffiliate($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'JobeetAffiliate', 'JobeetAffiliateQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     JobeetCategoryAffiliate $jobeetCategoryAffiliate Object to remove from the list of results
	 *
	 * @return    JobeetCategoryAffiliateQuery The current query, for fluid interface
	 */
	public function prune($jobeetCategoryAffiliate = null)
	{
		if ($jobeetCategoryAffiliate) {
			$this->addCond('pruneCond0', $this->getAliasedColName(JobeetCategoryAffiliatePeer::CATEGORY_ID), $jobeetCategoryAffiliate->getCategoryId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(JobeetCategoryAffiliatePeer::AFFILIATE_ID), $jobeetCategoryAffiliate->getAffiliateId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
		}

		return $this;
	}

} // BaseJobeetCategoryAffiliateQuery