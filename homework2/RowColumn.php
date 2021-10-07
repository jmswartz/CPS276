

<html>
    <table border="2">
<? for ($r=1;$r<16;$r++) { ?>
    <tr>
    <? for ($c=1;$c<6;$c++) { ?>
<td> Row <?echo $r;?>
 Cell <?echo $c;?> 
</td>
        <? } ?> 
</tr>
<? } ?>
</table>

</html>