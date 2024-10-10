import { redirectTo } from "@/utils/route";
import { ActionIcon, Group, Menu, rem } from "@mantine/core";
import {  IconPencil } from "@tabler/icons-react";
export default function TableRowActions({
  item,
  editRoute,
}) {

  return (
    <Group gap={0} justify="flex-end" wrap="nowrap">
        <ActionIcon variant="subtle" color="blue" onClick={() => redirectTo(editRoute, item.id)}>
          <IconPencil style={{ width: rem(16), height: rem(16) }} stroke={1.5} />
        </ActionIcon>
    </Group>
  );
}
