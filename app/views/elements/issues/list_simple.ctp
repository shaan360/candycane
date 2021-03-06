<?php if ( !empty($issues)): ?>
<!-- <% if issues && issues.any? %> -->
<form method="post">
	<table class="list issues">		
		<thead><tr>
		<th>#</th>
		<th><?php __('Tracker') ?></th>
		<th><?php __('Subject') ?></th>
		</tr></thead>
		<tbody>	
		<?php foreach($issues as $issue): ?>
		<tr id="issue-<?php echo $issue['Issue']['id'] ?>" class="hascontextmenu <?php echo $candy->cycle('odd','even')?> <%= css_issue_classes(issue) %>">
			<td class="id">
<!-- 			    <%= check_box_tag("ids[]", issue.id, false, :style => 'display:none;') %>-->
					<input type="checkbox" name="ids[]" value="<?php echo h($issue['Issue']['id']) ?>" style="display:none">
<!-- 				<%= link_to issue.id, :controller => 'issues', :action => 'show', :id => issue %> -->
				<?php echo $html->link($issue['Issue']['id'],aa('controller','issues','action','show','id',$issue['Issue']['id'])); ?>
			</td>
			<td><?php echo h($issue['Project']['name']) ?> - <?php echo $issue['Tracker']['name'] ?><br />
                <?php echo $issue['Status']['name'] ?> - <?php echo $candy->format_time($issue['Issue']['updated_on']) ?></td>
			<td class="subject">
                <?php echo $html->link($issue['Issue']['subject'],aa('controller','issues','action','show','id',$issue['Issue']['id'])) ?>
            </td>
		</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</form>
<?php else: ?>
	<p class="nodata"><?php __('No data to display') ?></p>
<?php endif; ?>
