<?php namespace App\Model;

use Baum\Node;

/**
 * App\Model\Page
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $lft
 * @property integer $rgt
 * @property integer $depth
 * @property string $title
 * @property string $text
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $public
 * @property string $link
 * @property-read \App\Model\Page $parent
 * @property-read \Baum\Extensions\Eloquent\Collection|\App\Model\Page[] $children
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Page whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Page whereParentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Page whereLft($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Page whereRgt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Page whereDepth($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Page whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Page whereText($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Page whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Page wherePublic($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Page whereLink($value)
 * @method static \Illuminate\Database\Query\Builder|\Baum\Node withoutNode($node)
 * @method static \Illuminate\Database\Query\Builder|\Baum\Node withoutSelf()
 * @method static \Illuminate\Database\Query\Builder|\Baum\Node withoutRoot()
 * @method static \Illuminate\Database\Query\Builder|\Baum\Node limitDepth($limit)
 * @mixin \Eloquent
 */
class Page extends Node
{

}
