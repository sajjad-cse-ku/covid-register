import { ActionIcon, Group, rem, Table, Text } from '@mantine/core';
import { redirectTo } from '@/utils/route.js';
import { IconPencil } from '@tabler/icons-react';
export default function TableRow({ item }) {
  return (
    <Table.Tr key={item.id}>
      <Table.Td>
        <Group gap="sm">
          <div>
            <Text fz="sm" fw={500}>
              {item?.center_name}
            </Text>
          </div>
        </Group>
      </Table.Td>
      <Table.Td>
        <Group gap="sm">
          <div>
            <Text fz="sm" c="dimmed">
              {item?.daily_limit}
            </Text>
          </div>
        </Group>
      </Table.Td>
      <Table.Td>
        <Group gap={0} justify="flex-end" wrap="nowrap">
          <ActionIcon variant="subtle" color="blue" onClick={() => redirectTo("dashboard", item.id)}>
            <IconPencil style={{ width: rem(16), height: rem(16) }} stroke={1.5} />
          </ActionIcon>
        </Group>
      </Table.Td>
    </Table.Tr>
  );
}
